<?php

namespace App\Services\Eloquents;

use App\DTOs\BaseDTO;
use App\Repositories\Contracts\InvoiceRepositoryInterface;
use App\Services\BaseService;
use App\Services\Contracts\InvoiceServiceInterface;

class InvoiceService extends BaseService implements InvoiceServiceInterface
{
    public function __construct(
        protected InvoiceRepositoryInterface $invoiceRepository
    ) {
        parent::__construct($invoiceRepository);
    }

    public function createInvoice($data, $orderFruits)
    {
        $invoice = $this->create($data);

        $invoice->fruits()->attach($orderFruits);

        return $invoice;
    }

    public function updateInvoice($data, $id, $orderFruits)
    {
        $invoice = $this->find($id);
        $this->update($data, $id);
        $invoice->fruits()->sync($orderFruits);

        return $invoice;
    }

    public function getInvoice($id)
    {
        $relationships = [
            'user',
            'fruits'
        ];

        $this->findOrFail($id);
        $invoice = $this->findAndWith($id, $relationships);
        $invoice->total = 0;

        foreach ($invoice->fruits as $key => $fruit) {
            $fruit->order = $key + 1;
            $fruit->categoryName = $fruit->pivot->category_name;
            $fruit->quantity = $fruit->pivot->quantity;
            $invoice->total += $fruit->price * $fruit->quantity;
            unset($fruit->pivot);
        }

        return $invoice;
    }
}

<?php

namespace App\Http\Controllers\Invoice;

use App\DTOs\Invoice\InvoiceEditDTO;
use App\Http\Controllers\Controller;
use App\Services\Contracts\InvoiceServiceInterface;

class EditController extends Controller
{
    public function __construct(
        private InvoiceServiceInterface $invoiceService
    ) {
    }

    public function __invoke($id)
    {
        $invoice = $this->invoiceService->getInvoice($id);
        $invoice = InvoiceEditDTO::fromModel($invoice);

        return view('pages.invoice.edit', [
            'invoice' => $invoice->toArray(),
        ]);
    }
}

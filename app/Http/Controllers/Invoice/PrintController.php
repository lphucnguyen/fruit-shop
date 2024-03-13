<?php

namespace App\Http\Controllers\Invoice;

use App\DTOs\Invoice\InvoicePrintDTO;
use App\Http\Controllers\Controller;
use App\Services\Contracts\InvoiceServiceInterface;

class PrintController extends Controller
{
    public function __construct(
        private InvoiceServiceInterface $invoiceService
    ) {
    }

    public function __invoke($id)
    {
        $invoice = $this->invoiceService->getInvoice($id);
        $invoice = InvoicePrintDTO::fromModel($invoice);

        return view('pdf.invoice', [
            'invoice' => $invoice->toArray(),
        ]);
    }
}

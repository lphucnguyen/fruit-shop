<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Services\Contracts\InvoiceServiceInterface;

class ShowController extends Controller
{
    public function __construct(
        private InvoiceServiceInterface $invoiceService
    )
    {
    }

    public function __invoke()
    {
        $invoices = $this->invoiceService->paginate();
        return view('pages.invoice.index', [
            'invoices' => $invoices
        ]);
    }
}

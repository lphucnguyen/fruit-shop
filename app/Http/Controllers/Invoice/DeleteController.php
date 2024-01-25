<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Invoice\DeleteInvoiceRequest;
use App\Services\Contracts\InvoiceServiceInterface;

class DeleteController extends Controller
{
    public function __construct(
        private InvoiceServiceInterface $invoiceService
    ) {
    }

    public function __invoke(DeleteInvoiceRequest $request)
    {
        $request->validated();
        $this->invoiceService->delete($request->id);

        return redirect()->route('invoice.index')->with('success', 'Invoice deleted successfully');
    }
}

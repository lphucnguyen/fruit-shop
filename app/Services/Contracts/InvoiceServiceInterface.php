<?php

namespace App\Services\Contracts;

use App\DTOs\BaseDTO;
use App\Services\ServiceInterface;

interface InvoiceServiceInterface extends ServiceInterface
{
    public function createInvoice(BaseDTO $data, array $orderDetails);

    public function updateInvoice(BaseDTO $data, int $id, array $orderDetails);

    public function getInvoice($id);
}

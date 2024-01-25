<?php

namespace App\DTOs\Invoice;

use App\DTOs\BaseDTO;

class InvoicePrintDTO extends BaseDTO
{
    public $id;
    public $fruits;
    public $total;
    public $customer_name;
    public $user;
    public $created_at;
}
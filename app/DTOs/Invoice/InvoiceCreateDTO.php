<?php

namespace App\DTOs\Invoice;

use App\DTOs\BaseDTO;

class InvoiceCreateDTO extends BaseDTO
{
    public $customer_name;
    public $user_id;
}

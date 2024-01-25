<?php

namespace App\Repositories\Eloquents;

use App\Models\Invoice;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\InvoiceRepositoryInterface;

class InvoiceRepository extends BaseRepository implements InvoiceRepositoryInterface
{
    public function __construct(
        protected Invoice $model
    ) {
        parent::__construct($model);
    }
}
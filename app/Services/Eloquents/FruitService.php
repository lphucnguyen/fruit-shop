<?php

namespace App\Services\Eloquents;

use App\Repositories\Contracts\FruitRepositoryInterface;
use App\Services\BaseService;
use App\Services\Contracts\FruitServiceInterface;

class FruitService extends BaseService implements FruitServiceInterface
{
    public function __construct(
        protected FruitRepositoryInterface $fruitRepository
    ) {
        parent::__construct($fruitRepository);
    }
}
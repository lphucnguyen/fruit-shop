<?php

namespace App\Repositories\Eloquents;

use App\Models\Fruit;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\FruitRepositoryInterface;

class FruitRepository extends BaseRepository implements FruitRepositoryInterface
{
    public function __construct(
        protected Fruit $model
    ) {
        parent::__construct($model);
    }
}
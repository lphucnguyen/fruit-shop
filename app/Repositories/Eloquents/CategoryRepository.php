<?php

namespace App\Repositories\Eloquents;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(
        protected Category $model
    ) {
        parent::__construct($model);
    }
}
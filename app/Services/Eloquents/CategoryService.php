<?php

namespace App\Services\Eloquents;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Services\BaseService;
use App\Services\Contracts\CategoryServiceInterface;

class CategoryService extends BaseService implements CategoryServiceInterface
{
    public function __construct(
        protected CategoryRepositoryInterface $categoryRepository
    ) {
        parent::__construct($categoryRepository);
    }
}
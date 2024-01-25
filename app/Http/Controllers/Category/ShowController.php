<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Services\Contracts\CategoryServiceInterface;

class ShowController extends Controller
{
    public function __construct(
        private CategoryServiceInterface $categoryService
    ) {
    }

    public function __invoke()
    {
        $categories = $this->categoryService->paginate();

        return view('pages.category.index', [
            'categories' => $categories
        ]);
    }
}

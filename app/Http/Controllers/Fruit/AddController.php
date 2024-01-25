<?php

namespace App\Http\Controllers\Fruit;

use App\Http\Controllers\Controller;
use App\Services\Contracts\CategoryServiceInterface;

class AddController extends Controller
{
    public function __construct(
        private CategoryServiceInterface $categoryService
    ) {
    }

    public function __invoke()
    {
        $categories = $this->categoryService->all();

        return view('pages.fruit.add', [
            'categories' => $categories
        ]);
    }
}

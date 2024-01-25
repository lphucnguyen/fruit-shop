<?php

namespace App\Http\Controllers\Category;

use App\DTOs\Category\CategoryCreateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Services\Contracts\CategoryServiceInterface;

class CreateController extends Controller
{
    public function __construct(
        private CategoryServiceInterface $categoryService
    ) {
    }

    public function __invoke(CreateCategoryRequest $request)
    {
        $createCategoryDTO = CategoryCreateDTO::create($request->validated());
        $this->categoryService->create($createCategoryDTO);

        return redirect()
            ->route('category.index')
            ->with('success', 'Category created successfully');
    }
}

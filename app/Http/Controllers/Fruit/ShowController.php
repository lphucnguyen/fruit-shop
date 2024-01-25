<?php

namespace App\Http\Controllers\Fruit;

use App\Http\Controllers\Controller;
use App\Services\Contracts\FruitServiceInterface;

class ShowController extends Controller
{
    public function __construct(
        private FruitServiceInterface $fruitService
    ) {
    }

    public function __invoke()
    {
        $fruits = $this->fruitService->paginate();

        return view('pages.fruit.index', [
            'fruits' => $fruits
        ]);
    }
}

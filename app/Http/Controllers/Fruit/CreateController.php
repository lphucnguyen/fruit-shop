<?php

namespace App\Http\Controllers\Fruit;

use App\DTOs\Fruit\FruitCreateDTO;
use App\Enums\Fruit\UnitEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Fruit\CreateFruitRequest;
use App\Services\Contracts\FruitServiceInterface;

class CreateController extends Controller
{
    public function __construct(
        private FruitServiceInterface $fruitService
    ) {
    }

    public function __invoke(CreateFruitRequest $request)
    {
        $createFruitDTO = FruitCreateDTO::create($request->validated());
        $isValid = UnitEnum::isValid($createFruitDTO->toArray()['unit']);

        if (!$isValid) {
            return redirect()
                ->back()
                ->withErrors(['unit', 'Unit is not valid!']);
        }

        $this->fruitService->create($createFruitDTO);

        return redirect()
            ->route('fruit.index')
            ->with('success', 'Fruit created successfully');
    }
}

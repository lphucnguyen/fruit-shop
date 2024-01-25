<?php

namespace App\Traits\DTO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait StaticCreateSelf
{
    public static function create(array $values): self
    {
        $dto = new static();

        foreach ($values as $key => $value) {
            if (property_exists($dto, $key)) {
                $dto->$key = $value;
            }
        }

        return $dto;
    }

    public static function fromRequest(Request $request): self
    {
        return self::create($request->all());
    }

    public static function fromModel(Model $model): self
    {
        return self::create($model->toArray());
    }
}
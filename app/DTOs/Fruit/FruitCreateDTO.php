<?php

namespace App\DTOs\Fruit;

use App\DTOs\BaseDTO;

class FruitCreateDTO extends BaseDTO
{
    public $name;
    public $category_id;
    public $price;
    public $unit;
}
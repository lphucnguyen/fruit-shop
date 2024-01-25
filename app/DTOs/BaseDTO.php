<?php

namespace App\DTOs;

use App\Traits\DTO\StaticCreateSelf;
use App\Traits\DTO\ToArray;

class BaseDTO
{
    use StaticCreateSelf;
    use ToArray;
}
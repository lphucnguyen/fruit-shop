<?php

namespace App\Traits\DTO;

trait ToArray
{
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
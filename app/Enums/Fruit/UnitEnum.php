<?php

namespace App\Enums\Fruit;

enum UnitEnum: string
{
    case KG = 'kg';
    case PCS = 'pcs';
    case PACK = 'pack';

    public static function getValue($value)
    {
        $cases = self::cases();
        $index = array_search(strtoupper($value), array_column($cases, "name"));
        if ($index !== false) {
            return $cases[$index];
        }

        return null;
    }

    public static function isValid($value)
    {
        $lowerValue = strtolower($value);
        $cases = array_column(self::cases(), 'value');

        return in_array($lowerValue, $cases);
    }
}
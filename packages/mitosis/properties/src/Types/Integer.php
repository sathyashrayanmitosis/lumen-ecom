<?php


namespace Mitosis\Properties\Types;

use Mitosis\Properties\Contracts\PropertyType;

class Integer implements PropertyType
{
    public function getName(): string
    {
        return __('Integer');
    }

    public function transformValue(string $value, ?array $settings)
    {
        return (int) $value;
    }
}

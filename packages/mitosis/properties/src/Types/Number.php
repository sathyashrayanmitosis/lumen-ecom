<?php


namespace Mitosis\Properties\Types;

use Mitosis\Properties\Contracts\PropertyType;

class Number implements PropertyType
{
    public function getName(): string
    {
        return __('Number');
    }

    public function transformValue(string $value, ?array $settings)
    {
        return (float) $value;
    }
}

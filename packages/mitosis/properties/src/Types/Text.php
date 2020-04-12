<?php


namespace Mitosis\Properties\Types;

use Mitosis\Properties\Contracts\PropertyType;

class Text implements PropertyType
{
    public function getName(): string
    {
        return __('Text');
    }

    public function transformValue(string $value, ?array $settings)
    {
        return $value;
    }
}

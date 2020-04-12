<?php

namespace Mitosis\Properties\Contracts;

interface PropertyType
{
    public function getName(): string;

    public function transformValue(string $value, ?array $settings);
}

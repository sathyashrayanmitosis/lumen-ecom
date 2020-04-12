<?php


namespace Mitosis\Properties\Contracts;

use Illuminate\Support\Collection;

interface Property
{
    public function getType(): PropertyType;

    public function values(): Collection;
}

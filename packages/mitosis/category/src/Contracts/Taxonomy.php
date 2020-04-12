<?php


namespace Mitosis\Category\Contracts;

use Illuminate\Support\Collection;

interface Taxonomy
{
    /**
     * Returns a taxonomy based on its name
     *
     * @param string $name
     *
     * @return Taxonomy|null
     */
    public static function findOneByName(string $name);

    /**
     * Returns the root level taxons for the taxonomy
     *
     * @return Collection
     */
    public function rootLevelTaxons(): Collection;
}

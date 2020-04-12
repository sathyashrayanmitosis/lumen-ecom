<?php
/**
 * Contains the ModuleTest class.
 *
 * 
 * 
 * 
 * @since       2018-08-27
 *
 */

namespace Mitosis\Category\Tests;

use Mitosis\Category\Contracts\Taxonomy as TaxonomyContract;
use Mitosis\Category\Contracts\Taxon as TaxonContract;
use Mitosis\Category\Models\Taxon;
use Mitosis\Category\Models\Taxonomy;
use Mitosis\Category\Providers\ModuleServiceProvider;

class ModuleTest extends TestCase
{
    /** @test */
    public function module_loads()
    {
        $this->assertInstanceOf(
            ModuleServiceProvider::class,
            $this->app->concord->module('mitosis.category')
        );
    }

    /** @test */
    public function models_are_registered()
    {
        $models = $this->app->concord->getModelBindings();

        $this->assertCount(2, $models);
        // Default model bindings should be registered by default
        $this->assertEquals(Taxonomy::class, $models->get(TaxonomyContract::class));
        $this->assertEquals(Taxon::class, $models->get(TaxonContract::class));
    }

    /** @test */
    public function shorts_are_registered()
    {
        $this->assertEquals(TaxonContract::class, concord()->short('taxon'));
        $this->assertEquals(TaxonomyContract::class, concord()->short('taxonomy'));
    }
}

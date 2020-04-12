<?php


namespace Mitosis\Checkout\Tests;

use Konekt\Concord\ConcordServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Mitosis\Checkout\Contracts\CheckoutDataFactory;
use Mitosis\Checkout\Providers\ModuleServiceProvider as CheckoutModule;
use Mitosis\Checkout\Tests\Example\DataFactory;
use Mitosis\Support\Tests\Traits\Laravel54TestCompatibility;

abstract class TestCase extends Orchestra
{
    use Laravel54TestCompatibility;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app->bind(CheckoutDataFactory::class, DataFactory::class);

        $this->setUpDatabase($this->app);
        $this->startSession();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ConcordServiceProvider::class
        ];
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        //$app['path.lang'] = __DIR__ . '/lang';

        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * Set up the database.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase($app)
    {
        \Artisan::call('migrate', ['--force' => true]);
    }

    /**
     * @inheritdoc
     */
    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $app['config']->set('concord.modules', [
            CheckoutModule::class
        ]);

        $app['config']->set('session.drive', 'array');
    }
}

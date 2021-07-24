<?php

namespace Muhaimenul\Larasearch\Tests;

use Muhaimenul\Larasearch\LarasearchServiceProvider;
use Muhaimenul\Larasearch\Tests\Searchables\User;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{

    /** @var \Illuminate\Database\Eloquent\Model */
    protected $testSearchableModel;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        // Code before application created.

        parent::setUp();

        // Code after application created.

        $this->testSearchableModel = new User();
    }


    /**
     * Get package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            LarasearchServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // add custom database connection

    }
}

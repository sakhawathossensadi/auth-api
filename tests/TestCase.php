<?php

namespace Analyzen\Auth\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Laravel\Passport\PassportServiceProvider;
use Analyzen\Auth\Models\User;

class TestCase extends OrchestraTestCase
{
    use WithFaker;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadLaravelMigrations();
        $this->artisan('migrate')->run();

        $user = User::factory()->create();
        $this->user = $user;
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */

    protected function getEnvironmentSetUp($app)
    {
        $guards = $app['config']->get('auth.guards');

        $guards['api'] = [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ];

        $app['config']->set('auth.guards', $guards);

        $app['config']->set('auth.defaults.guard', 'api');

        $app['config']->set('auth.providers.users.model', User::class);
    }

    protected function getPackageProviders($app)
    {
        return [
            'Analyzen\\Auth\\ServiceProvider',
            'Analyzen\\Auth\\AuthServiceProvider',
            PassportServiceProvider::class,
        ];
    }
}

<?php

namespace Pathshala\Auth;

use Illuminate\Support\ServiceProvider as SupportServiceProvider;
use Illuminate\Support\Facades\Route;

class ServiceProvider extends SupportServiceProvider
{
    private $rootPath;

    public function register()
    {
        $this->rootPath = realpath(__DIR__ . '/../');

        $this->app->register(AuthServiceProvider::class);
    }

    public function boot()
    {
        $this->loadRoutes();

        if (app()->runningInConsole()) {
            $this->loadConsoleResources();
        }
    }

    private function loadRoutes(): void
    {
        Route::group($this->routeConfiguration(), function (): void {
            Route::group(['middleware' => 'api'], function (): void {
                $this->loadRoutesFrom($this->rootPath . '/routes/api.php');
            });

            Route::group(['middleware' => 'web'], function (): void {
                $this->loadRoutesFrom($this->rootPath . '/routes/web.php');
            });
        });
    }

    private function routeConfiguration(): array
    {
        return [
            'namespace' => 'Analyzen\Auth\Http\Controllers',
        ];
    }

    private function loadConsoleResources(): void
    {
        $this->loadMigrationsFrom($this->rootPath . '/database/migrations');
    }
}

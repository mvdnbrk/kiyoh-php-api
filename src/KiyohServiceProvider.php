<?php

namespace Mvdnbrk\Kiyoh;

use Illuminate\Support\ServiceProvider;
use Mvdnbrk\Kiyoh\Console\Commands\ImportCommand;

class KiyohServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerCommands();
        $this->registerMigrations();
        $this->registerPublishing();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/kiyoh.php', 'kiyoh');

        $this->app->singleton(Client::class, function () {
            return (new Client())->setApiKey(
                config('kiyoh.secret')
            );
        });

        $this->app->alias(Client::class, 'kiyoh');
    }

    /**
     * Register artisan commands.
     *
     * @return void
     */
    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ImportCommand::class,
            ]);
        }
    }

    /**
     * Register the migrationsn for this package.
     *
     * @return void
     */
    private function registerMigrations()
    {
        if ($this->app->runningInConsole() && $this->shouldMigrate()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }

    /**
     * Register the publishable resources for this package.
     *
     * @return void
     */
    private function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/kiyoh.php' => config_path('kiyoh.php'),
            ], 'kiyoh-config');

            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'kiyoh-migrations');
        }
    }

    /**
     * Determine if we should register the migrations.
     *
     * @return bool
     */
    protected function shouldMigrate()
    {
        return Kiyoh::$runsMigrations;
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['kiyoh'];
    }
}

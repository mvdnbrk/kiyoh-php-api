<?php

namespace Mvdnbrk\Kiyoh\Tests;

use Dotenv\Dotenv;
use Mvdnbrk\Kiyoh\Client;
use Mvdnbrk\Kiyoh\KiyohServiceProvider;
use Dotenv\Exception\InvalidFileException;
use Dotenv\Exception\InvalidPathException;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        try {
            Dotenv::create('./', '.env')->load();
        } catch (InvalidPathException $e) {
            //
        } catch (InvalidFileException $e) {
            die('The environment file is invalid: '.$e->getMessage());
        }

        $this->client = new Client();
        $this->client->setCompanyId(getenv('KIYOH_ID'));
        $this->client->setApiKey(getenv('KIYOH_SECRET'));

        parent::setUp();
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            KiyohServiceProvider::class,
        ];
    }
}

<?php

namespace Mvdnbrk\Kiyoh\Tests;

use Dotenv\Dotenv;
use Dotenv\Exception\InvalidFileException;
use Dotenv\Exception\InvalidPathException;
use GuzzleHttp\Client as GuzzleClient;
use Mvdnbrk\Kiyoh\Client as KiyohClient;
use Mvdnbrk\Kiyoh\KiyohServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /** @var \Mvdnbrk\Kiyoh\Client */
    protected $client;

    /** @var \GuzzleHttp\ClientInterface */
    protected $guzzleClient;

    protected function setUp(): void
    {
        try {
            (Dotenv::createImmutable(__DIR__.'/..'))->load();
        } catch (InvalidPathException $e) {
            //
        } catch (InvalidFileException $e) {
            dd('The environment file is invalid');
        }

        $this->guzzleClient = $this->createMock(GuzzleClient::class);

        $this->client = new KiyohClient($this->guzzleClient);
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
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
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

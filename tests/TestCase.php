<?php

namespace Mvdnbrk\Kiyoh\Tests;

use Dotenv\Dotenv;
use Mvdnbrk\Kiyoh\Client;
use Dotenv\Exception\InvalidFileException;
use Dotenv\Exception\InvalidPathException;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        try {
            (new Dotenv('./', '.env'))->load();
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
}

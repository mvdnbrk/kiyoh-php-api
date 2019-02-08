<?php

namespace Mvdnbrk\Kiyoh\Tests;

use Mvdnbrk\Kiyoh\Feed;
use Psr\Http\Message\ResponseInterface;
use Mvdnbrk\Kiyoh\Exceptions\KiyohException;

class ClientTest extends TestCase
{
    /** @test */
    public function it_has_a_feed()
    {
        $this->assertInstanceOf(Feed::class, $this->client->feed);
    }

    /** @test */
    public function performing_an_http_call_without_setting_an_api_key_throws_an_exception()
    {
        $this->expectException(KiyohException::class);
        $this->expectExceptionMessage('You have not set an API key. Please use setApiKey() to set the API key.');

        $this->client->setApiKey(null);
        $this->client->setCompanyId('9999');

        $this->client->performHttpCall();
    }

    /** @test */
    public function performing_an_http_call_without_setting_an_company_id_throws_an_exception()
    {
        $this->expectException(KiyohException::class);
        $this->expectExceptionMessage('You have not set a company ID. Please use setCompanyId() to set the company ID.');

        $this->client->setApiKey('secret-api-key');
        $this->client->setCompanyId(null);

        $this->client->performHttpCall();
    }

    /** @test */
    public function performing_an_http_call_with_invalid_credentials_throws_an_error()
    {
        $this->expectException(KiyohException::class);
        $this->expectExceptionMessage('No company found.');

        $this->client->setApiKey('invalid-api-key');
        $this->client->setCompanyId('99999');

        $this->client->performHttpCall();
    }
}

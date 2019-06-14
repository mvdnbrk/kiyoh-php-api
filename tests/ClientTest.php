<?php

namespace Mvdnbrk\Kiyoh\Tests;

use Mvdnbrk\Kiyoh\Feed;
use GuzzleHttp\Psr7\Response;
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

        $this->client->performHttpCall();
    }

    /** @test */
    public function performing_an_http_call_with_invalid_credentials_throws_an_error()
    {
        $response = new Response(400, [], file_get_contents('./tests/fixtures/invalid-hash.xml'));
        $this->guzzleClient->expects($this->once())->method('send')->willReturn($response);

        $this->expectException(KiyohException::class);
        $this->expectExceptionMessage('Invalid hash');

        $this->client->setApiKey('invalid-api-key');

        $this->client->performHttpCall();
    }
}

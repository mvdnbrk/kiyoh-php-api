<?php

namespace Mvdnbrk\Kiyoh\Tests\Console;

use Mvdnbrk\Kiyoh\Client;
use GuzzleHttp\Psr7\Response;
use Mvdnbrk\Kiyoh\Models\Review;
use Mvdnbrk\Kiyoh\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImportCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_import_reviews()
    {
        $this->swap(Client::class, $this->client);
        $response = new Response(200, [], file_get_contents('./tests/fixtures/feed.json'));
        $this->guzzleClient->expects($this->once())->method('send')->willReturn($response);

        $this->artisan('kiyoh:import');

        $this->assertCount(3, Review::all());
    }

    /** @test */
    public function it_can_import_migrated_reviews()
    {
        $this->swap(Client::class, $this->client);
        $response = new Response(200, [], file_get_contents('./tests/fixtures/feed.json'));
        $this->guzzleClient->expects($this->once())->method('send')->willReturn($response);

        $this->artisan('kiyoh:import --with-migrated');

        $this->assertCount(4, Review::all());
    }
}

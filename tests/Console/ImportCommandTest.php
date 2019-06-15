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
        tap(Review::first(), function ($review) {
            $this->assertEquals('12345678-aaaa-0000-0000-000000000000', $review->review_id);
            $this->assertEquals('10', $review->rating);
            $this->assertEquals('2019-06-03 16:30:24', $review->created_at->toDateTimeString());
            $this->assertEquals('2019-06-03 16:30:24', $review->updated_at->toDateTimeString());
        });
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

    /** @test */
    public function payload_does_not_have_all_attributes()
    {
        $this->swap(Client::class, $this->client);
        $response = new Response(200, [], file_get_contents('./tests/fixtures/feed.json'));
        $this->guzzleClient->expects($this->once())->method('send')->willReturn($response);

        $this->artisan('kiyoh:import');

        tap(Review::first(), function ($review) {
            $this->assertArrayNotHasKey('uuid', $review->payload);
            $this->assertArrayNotHasKey('created_at', $review->payload);
            $this->assertArrayNotHasKey('updated_at', $review->payload);
        });
    }
}

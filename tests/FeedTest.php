<?php

namespace Mvdnbrk\Kiyoh\Tests;

use GuzzleHttp\Psr7\Response;
use Mvdnbrk\Kiyoh\Exceptions\KiyohException;
use Mvdnbrk\Kiyoh\Feed;
use Tightenco\Collect\Support\Collection;

class FeedTest extends TestCase
{
    /** @test */
    public function it_has_a_feed()
    {
        $this->assertInstanceOf(Feed::class, $this->client->feed);
    }

    /** @test */
    public function the_feed_has_a_collection_of_reviews()
    {
        $this->assertInstanceOf(Collection::class, $this->client->feed->reviews);
    }

    /** @test */
    public function it_has_a_default_limit_of_ten()
    {
        $this->assertSame(10, $this->client->feed->getLimit());
    }

    /** @test */
    public function it_can_set_the_limit()
    {
        $this->client->feed->limit(999);

        $this->assertSame(999, $this->client->feed->getLimit());
    }

    /** @test */
    public function setting_a_negative_limit_has_no_affect()
    {
        $this->client->feed->limit(-1);

        $this->assertSame(10, $this->client->feed->getLimit());
    }

    /** @test */
    public function setting_an_invalid_limit_has_no_effect()
    {
        $this->client->feed->limit('invalid-value');

        $this->assertSame(10, $this->client->feed->getLimit());
    }

    /** @test */
    public function it_can_get_the_feed()
    {
        $response = new Response(200, [], file_get_contents('./tests/fixtures/feed.json'));
        $this->guzzleClient->expects($this->once())->method('send')->willReturn($response);

        $feed = $this->client->feed->get();

        $this->assertSame(123456, $feed->company->id);
        $this->assertEquals('MyCompany', $feed->company->name);
        $this->assertSame(9.0, $feed->company->averageRating);
        $this->assertSame(3, $feed->company->reviewCount);
        $this->assertSame(97, $feed->company->recommendationPercentage);

        $this->assertCount(3, $feed->reviews);
        tap($feed->reviews->first(), function ($review) {
            $this->assertEquals('12345678-aaaa-0000-0000-000000000000', $review->uuid);
            $this->assertTrue($review->recommendation);
            $this->assertEquals('Oneliner. Lorem ipsum.', $review->headline);
            $this->assertEquals('Opinion. Lorem ipsum.', $review->text);
            $this->assertSame(10, $review->rating);
            $this->assertEquals('John Doe', $review->author->name);
            $this->assertEquals('Amsterdam', $review->author->locality);
            $this->assertEquals('2019-06-03T16:30:24.278Z', $review->created_at);
            $this->assertEquals('2019-06-03T16:30:24.278Z', $review->updated_at);
        });
    }

    /** @test */
    public function it_can_retrieve_the_feed_with_migrated_reviews()
    {
        $response = new Response(200, [], file_get_contents('./tests/fixtures/feed.json'));
        $this->guzzleClient->expects($this->once())->method('send')->willReturn($response);

        $feed = $this->client->feed->withMigrated()->get();

        $this->assertCount(4, $feed->reviews);
    }

    /** @test */
    public function it_throws_an_exception_when_no_response_is_received()
    {
        $this->expectException(KiyohException::class);
        $this->expectExceptionMessage('No API response received.');

        $feed = $this->client->feed->get();
    }

    /** @test */
    public function it_throws_an_exception_when_the_response_has_malformed_json()
    {
        $this->expectException(KiyohException::class);
        $this->expectExceptionMessage("Unable to decode response: '{'malformed': 'json'}'");

        $response = new Response(200, [], "{'malformed': 'json'}");
        $this->guzzleClient->expects($this->once())->method('send')->willReturn($response);

        $feed = $this->client->feed->get();
    }
}

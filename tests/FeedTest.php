<?php

namespace Mvdnbrk\Kiyoh\Tests;

use Mvdnbrk\Kiyoh\Feed;
use Tightenco\Collect\Support\Collection;

class FeedTest extends TestCase
{
    /** @test */
    public function it_has_a_collection_of_reviews()
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
    public function it_can_set_the_limit_to_all()
    {
        $this->client->feed->all();

        $this->assertSame('all', $this->client->feed->getLimit());
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
        $feed = $this->client->feed->get();

        $this->assertInstanceOf(Feed::class, $feed);
    }
}

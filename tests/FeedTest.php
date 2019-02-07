<?php

namespace Mvdnbrk\Kiyoh\Tests;

use Mvdnbrk\Kiyoh\Feed;

class FeedTest extends TestCase
{
    /** @test */
    public function client_has_a_feed()
    {
        $this->assertInstanceOf(Feed::class, $this->client->feed);
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
    }

    /** @test */
    public function it_can_get_the_feed()
    {
        $feed = $this->client->feed->get();

        $this->assertInstanceOf(Feed::class, $feed);
    }
}

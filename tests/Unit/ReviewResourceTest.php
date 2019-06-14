<?php

namespace Mvdnbrk\Kiyoh\Tests\Unit\Resources;

use Mvdnbrk\Kiyoh\Tests\TestCase;
use Mvdnbrk\Kiyoh\Resources\Review;

class ReviewResourceTest extends TestCase
{
    /** @test */
    public function creating_a_review()
    {
        $review = new Review([
            'uuid' => '1',
            'rating' => '10',
            'recommendation' => true,
            'created_at' => '2019-02-01 12:34:56',
            'updated_at' => '2019-02-02 12:34:56',
            'author' => [
                'name' => 'John',
                'locality' => 'Amsterdam',
            ],
        ]);

        $this->assertEquals('1', $review->uuid);
        $this->assertSame(10, $review->rating);
        $this->assertTrue($review->recommendation);

        $this->assertEquals('2019-02-01 12:34:56', $review->created_at);
        $this->assertEquals('2019-02-01 12:34:56', $review->createdAt);
        $this->assertEquals('2019-02-02 12:34:56', $review->updated_at);
        $this->assertEquals('2019-02-02 12:34:56', $review->updatedAt);

        $this->assertEquals('John', $review->author->name);
        $this->assertEquals('Amsterdam', $review->author->locality);
    }

    /** @test */
    public function it_has_aliases_for_properties()
    {
        $review = new Review([
            'uuid' => '1234-aaaa',
        ]);

        $this->assertEquals('1234-aaaa', $review->uuid);
        $this->assertEquals('1234-aaaa', $review->reviewId);
    }

    /** @test */
    public function it_can_set_the_recommendation()
    {
        $review = new Review();

        $this->assertFalse($review->recommendation);

        $review->recommendation = true;
        $this->assertTrue($review->recommendation);

        $review->recommendation = 'true';
        $this->assertTrue($review->recommendation);

        $review->recommendation = false;
        $this->assertFalse($review->recommendation);

        $review->recommendation = 'false';
        $this->assertFalse($review->recommendation);
    }

    /** @test */
    public function converting_to_an_array()
    {
        $review = new Review([
            'uuid' => '1',
            'author' => [
                'name' => 'Mark',
                'locality' => 'Amsterdam',
            ],
            'recommendation' => true,
        ]);

        $this->assertEquals([
            'uuid' => '1',
            'author' => [
                'name' => 'Mark',
                'locality' => 'Amsterdam',
            ],
            'recommendation' => true,
        ], $review->toArray());
    }
}

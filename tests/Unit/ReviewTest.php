<?php

namespace Mvdnbrk\Kiyoh\Tests\Unit\Resources;

use Mvdnbrk\Kiyoh\Tests\TestCase;
use Mvdnbrk\Kiyoh\Resources\Review;

class ReviewTest extends TestCase
{
    /** @test */
    public function creating_a_review()
    {
        $review = new Review([
            'id' => '1',
            'rating' => '10',
            'recommendation' => 'Yes',
            'comment_positive' => 'Positive comment',
            'comment_negative' => 'Negative comment',
            'created_at' => '2019-02-01 12:34:56',
            'author' => [
                'name' => 'Mark',
                'locality' => 'Amsterdam',
            ],
            'meta' => [
                'reference' => 'some-value',
                'foo' => 'bar',
            ],
            'response' => 'Some response',
        ]);

        $this->assertSame(1, $review->id);
        $this->assertSame(10, $review->rating);
        $this->assertTrue($review->recommendation);
        $this->assertEquals('Positive comment', $review->comment_positive);
        $this->assertEquals('Negative comment', $review->comment_negative);
        $this->assertEquals('2019-02-01 12:34:56', $review->created_at);
        $this->assertEquals(['reference' => 'some-value', 'foo' => 'bar'], $review->meta);
        $this->assertEquals('Some response', $review->response);

        $this->assertEquals('Mark', $review->author->name);
        $this->assertEquals('Amsterdam', $review->author->locality);
    }
}

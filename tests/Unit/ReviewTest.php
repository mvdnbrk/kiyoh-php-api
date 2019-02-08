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
        $this->assertEquals('Positive comment', $review->positiveComment);
        $this->assertEquals('Negative comment', $review->negativeComment);

        $this->assertEquals('2019-02-01 12:34:56', $review->created_at);
        $this->assertEquals('2019-02-01 12:34:56', $review->createdAt);

        $this->assertEquals(['reference' => 'some-value', 'foo' => 'bar'], $review->meta);
        $this->assertEquals('Some response', $review->response);

        $this->assertEquals('Mark', $review->author->name);
        $this->assertEquals('Amsterdam', $review->author->locality);
    }

    /** @test */
    public function it_can_determine_if_it_has_response()
    {
        $review = new Review();

        $this->assertFalse($review->hasResponse());

        $review->response = 'Some response';

        $this->assertTrue($review->hasResponse());
    }

    /** @test */
    public function it_can_determine_if_it_has_a_positive_comment()
    {
        $review = new Review();

        $this->assertFalse($review->hasPositiveComment());

        $review->comment_positive = 'Some positive comment';

        $this->assertTrue($review->hasPositiveComment());
    }
}

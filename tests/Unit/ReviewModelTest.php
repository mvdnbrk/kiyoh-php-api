<?php

namespace Mvdnbrk\Kiyoh\Tests\Unit\Resources;

use Mvdnbrk\Kiyoh\Models\Review;
use Mvdnbrk\Kiyoh\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function creating_a_review_model()
    {
        $review = Review::create([
            'review_id' => '1234-aaaa-1234-aaaa',
            'rating' => '10',
            'recommendation' => '1',
            'payload' => [],
        ]);

        $this->assertCount(1, Review::all());
        tap(Review::first(), function ($review) {
            $this->assertEquals('1234-aaaa-1234-aaaa', $review->review_id);
            $this->assertEquals('10', $review->rating);
            $this->assertTrue($review->recommendation);
            $this->assertSame([], $review->payload);
        });
    }
}

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
            'company_id' => '123',
            'review_id' => '456',
            'rating' => '10',
            'payload' => [],
        ]);

        $this->assertCount(1, Review::all());
        tap(Review::first(), function ($review) {
            $this->assertEquals('123', $review->company_id);
            $this->assertEquals('456', $review->review_id);
            $this->assertEquals('10', $review->rating);
            $this->assertSame([], $review->payload);
        });
    }
}

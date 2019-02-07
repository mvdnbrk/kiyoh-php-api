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
        ]);

        $this->assertSame(1, $review->id);
    }
}

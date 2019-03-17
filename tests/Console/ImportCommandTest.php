<?php

namespace Mvdnbrk\Kiyoh\Tests\Console;

use Mvdnbrk\Kiyoh\Models\Review;
use Mvdnbrk\Kiyoh\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImportCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_import_reviews()
    {
        $this->artisan('kiyoh:import --limit=10');

        $this->assertCount(10, Review::all());
    }
}

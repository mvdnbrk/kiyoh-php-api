<?php

namespace Mvdnbrk\Kiyoh\Tests\Database;

use Mvdnbrk\Kiyoh\Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MigrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_runs_the_migrations()
    {
        $columns = Schema::getColumnListing('kiyoh_reviews');

        $this->assertEquals([
            'id',
            'company_id',
            'review_id',
            'rating',
            'payload',
            'created_at',
        ], $columns);
    }
}

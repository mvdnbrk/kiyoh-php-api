<?php

namespace Mvdnbrk\Kiyoh\Tests\Unit\Resources;

use Mvdnbrk\Kiyoh\Tests\TestCase;
use Mvdnbrk\Kiyoh\Resources\Company;

class CompanyTest extends TestCase
{
    /** @test */
    public function creating_a_company()
    {
        $company = new Company([
            'name' => 'MyCompany',
            'url' => 'https://kiyoh.nl/my-company',
            'views' => '123456',
            'review_count' => '9999',
            'aggregate_rating' => '9.8',
        ]);

        $this->assertEquals('MyCompany', $company->name);
        $this->assertEquals('https://kiyoh.nl/my-company', $company->url);
        $this->assertSame(123456, $company->views);
        $this->assertSame(9999, $company->review_count);
        $this->assertSame(9.8, $company->aggregate_rating);
    }

    /** @test */
    public function it_has_aliases_for_properties()
    {
        $company = new Company();

        $company->total_views = 111;
        $this->assertSame(111, $company->views);

        $company->total_reviews = 222;
        $this->assertSame(222, $company->review_count);

        $company->total_score = 10.0;
        $this->assertSame(10.0, $company->aggregate_rating);
    }
}

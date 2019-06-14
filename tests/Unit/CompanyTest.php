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
            'id' => '123',
            'name' => 'MyCompany',
            'review_count' => '9999',
            'average_rating' => '9.8',
            'recommendation_percentage' => '99',
        ]);

        $this->assertSame(123, $company->id);
        $this->assertEquals('MyCompany', $company->name);
        $this->assertSame(9999, $company->review_count);
        $this->assertSame(9.8, $company->average_rating);
        $this->assertSame(99, $company->recommendation_percentage);
    }

    /** @test */
    public function creating_a_company_from_kiyoh_feed_data()
    {
        $company = new Company([
            'locationId' => '123',
            'locationName' => 'MyCompany',
            'numberReviews' => '9999',
            'percentageRecommendation' => '97',
            'averageRating' => '9.8',
        ]);

        $this->assertSame(123, $company->id);
        $this->assertEquals('MyCompany', $company->name);
        $this->assertSame(9999, $company->review_count);
        $this->assertSame(97, $company->recommendation_percentage);
        $this->assertSame(9.8, $company->average_rating);
    }

    /** @test */
    public function it_has_aliases_for_properties()
    {
        $company = new Company([
            'numberReviews' => 222,
            'percentageRecommendation' => 97,
        ]);

        $this->assertSame(222, $company->reviewCount);
        $this->assertSame(222, $company->numberReviews);

        $this->assertSame(97, $company->recommendationPercentage);
        $this->assertSame(97, $company->percentageRecommendation);
    }

    /** @test */
    public function convenrting_to_an_array()
    {
        $company = new Company([
            'id' => '123',
            'name' => 'MyCompany',
            'review_count' => '9999',
            'average_rating' => '9.8',
            'recommendation_percentage' => '99',
        ]);

        $this->assertEquals([
            'id' => '123',
            'name' => 'MyCompany',
            'review_count' => '9999',
            'average_rating' => '9.8',
            'recommendation_percentage' => '99',
        ], $company->toArray());
    }
}

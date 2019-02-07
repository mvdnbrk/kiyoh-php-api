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
        ]);

        $this->assertEquals('MyCompany', $company->name);
        $this->assertEquals('https://kiyoh.nl/my-company', $company->url);
    }
}

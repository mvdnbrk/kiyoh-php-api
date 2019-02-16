<?php

namespace Mvdnbrk\Kiyoh\Tests\Support;

use Mvdnbrk\Kiyoh\Support\Str;
use Mvdnbrk\Kiyoh\Tests\TestCase;

class StrTest extends TestCase
{
    /** @test */
    public function studly()
    {
        $this->assertEquals('MvdnbrkTestStringPhp', Str::studly('mvdnbrk_test_string_php'));
        $this->assertEquals('MvdnbrkStringPhp', Str::studly('mvdnbrk_string_php'));
        $this->assertEquals('MvdnbrkTestStringPhp', Str::studly('mvdnbrk-testString-php'));
        $this->assertEquals('MvdnbrkStringPhp', Str::studly('mvdnbrk  -_-  string   -_-   php   '));
    }
}

<?php

namespace Mvdnbrk\Kiyoh\Tests\Support;

use Mvdnbrk\Kiyoh\Support\Str;
use Mvdnbrk\Kiyoh\Tests\TestCase;

class StrTest extends TestCase
{
    /** @test */
    public function studly()
    {
        $this->assertEquals('MvdnbrkKiyOhPhp', Str::studly('mvdnbrk_kiy_oh_php'));
        $this->assertEquals('MvdnbrkKiyohPhp', Str::studly('mvdnbrk_kiyoh_php'));
        $this->assertEquals('MvdnbrkKiyohPhp', Str::studly('mvdnbrk-kiyoh-php'));
        $this->assertEquals('MvdnbrkKiyohPhp', Str::studly('mvdnbrk  -_-  kiyoh   -_-   php   '));
    }
}

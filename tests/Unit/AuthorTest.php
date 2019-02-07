<?php

namespace Mvdnbrk\Kiyoh\Tests\Unit\Resources;

use Mvdnbrk\Kiyoh\Tests\TestCase;
use Mvdnbrk\Kiyoh\Resources\Author;

class AuthorTest extends TestCase
{
    /** @test */
    public function creating_an_author()
    {
        $author = new Author([
            'name' => 'John Doe',
            'locality' => 'Amsterdam',
        ]);

        $this->assertEquals('John Doe', $author->name);
        $this->assertEquals('Amsterdam', $author->locality);
    }
}

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

    /** @test */
    public function name_is_an_empty_string_by_default()
    {
        $author = new Author();

        $this->assertSame('', $author->name);
    }

    /** @test */
    public function locality_is_an_empty_string_by_default()
    {
        $author = new Author();

        $this->assertSame('', $author->locality);
    }
}

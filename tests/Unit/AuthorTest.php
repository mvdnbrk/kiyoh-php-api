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

    /** @test */
    public function it_has_aliases_for_properties()
    {
        $author = new Author([
            'reviewAuthor' => 'John',
            'city' => 'Amsterdam',
        ]);

        $this->assertEquals('John', $author->name);
        $this->assertEquals('John', $author->reviewAuthor);
        $this->assertEquals('Amsterdam', $author->locality);
        $this->assertEquals('Amsterdam', $author->city);
    }

    /** @test */
    public function it_can_determine_if_it_has_a_name()
    {
        $author = new Author();

        $this->assertFalse($author->hasName());

        $author->name = 'John Doe';

        $this->assertTrue($author->hasName());
    }

    /** @test */
    public function it_can_determine_if_it_has_a_locality()
    {
        $author = new Author();

        $this->assertFalse($author->hasLocality());

        $author->locality = 'Amsterdam';

        $this->assertTrue($author->hasLocality());
    }

    /** @test */
    public function convenrting_to_an_array()
    {
        $author = new Author([
            'name' => 'John Doe',
            'locality' => 'Amsterdam',
        ]);

        $this->assertEquals([
            'name' => 'John Doe',
            'locality' => 'Amsterdam',
        ], $author->toArray());
    }
}

<?php

namespace Mvdnbrk\Kiyoh\Resources;

class Review extends BaseResource
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var \Mvdnbrk\Kiyoh\Resources;
     */
    public $author;

    /**
     * @var string
     */
    public $comment_negative;

    /**
     * @var string
     */
    public $comment_positive;

    /**
     * @var bool
     */
    public $recommendation;

    /**
     * @var int
     */
    public $rating;

    /**
     * @var string
     */
    public $created_at;

    /**
     * @var mixed
     */
    public $meta;

    /**
     * Create a new Review instance.
     *
     * @param  array  $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->author = new Author(array_merge(
            $attributes['author'] ?? [],
            $attributes['customer'] ?? []
        ));
    }

    /**
     * Set the id for this review.
     *
     * @param  int|string  $value
     * @return void
     */
    public function setIdAttribute($value)
    {
        $this->id = (int) $value;
    }
}

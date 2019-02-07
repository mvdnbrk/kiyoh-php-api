<?php

namespace Mvdnbrk\Kiyoh\Resources;

class Review extends BaseResource
{
    /**
     * @var int
     */
    public $id;

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
     * @var array
     */
    public $meta;

    /**
     * Set the id of this resource.
     *
     * @param  int|string  $value
     * @return void
     */
    public function setIdAttribute($value)
    {
        $this->id = (int) $value;
    }
}

<?php

namespace Mvdnbrk\Kiyoh\Resources;

class Review extends BaseResource
{
    /**
     * @var string
     */
    public $uuid;

    /**
     * @var \Mvdnbrk\Kiyoh\Resources;
     */
    public $author;

    /**
     * @var string
     */
    public $headline;

    /**
     * @var bool
     */
    protected $recommendation;

    /**
     * @var string
     */
    public $text;

    /**
     * @var int
     */
    protected $rating;

    /**
     * @var string
     */
    public $created_at;

    /**
     * @var string
     */
    public $updated_at;

    /**
     * Create a new Review instance.
     *
     * @param  array  $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->recommendation = false;

        parent::__construct($attributes);

        $this->author = new Author(array_merge([
            'reviewAuthor' => $attributes['reviewAuthor'] ?? '',
            'city' => $attributes['city'] ?? '',
        ], $attributes['author'] ?? []));
    }

    /**
     * Get "createdAt" attribute for this review.
     *
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        return $this->created_at;
    }

    /**
     * Get "updatedAt" attribute for this review.
     *
     * @return string
     */
    public function getUpdatedAtAttribute()
    {
        return $this->updated_at;
    }

    /**
     * Get "reviewId" attribute for this review.
     *
     * @return string
     */
    public function getReviewIdAttribute()
    {
        return $this->uuid;
    }

    /**
     * Alias "dateSince" to the "created_at" attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setDateSinceAttribute($value)
    {
        $this->created_at = $value;
    }

    /**
     * Alias "reviewId" to the "uuid" attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setReviewIdAttribute($value)
    {
        $this->uuid = $value;
    }

    /**
     * Alias "updatedSince" to the "updated_at" attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setUpdatedSinceAttribute($value)
    {
        $this->updated_at = $value;
    }

    /**
     * Set the rating for this review.
     *
     * @param  int|string  $value
     * @return void
     */
    public function setRatingAttribute($value)
    {
        $this->rating = (int) $value;
    }

    /**
     * Set the recommendation for this review.
     *
     * @param  bool|string  $value
     * @return void
     */
    public function setRecommendationAttribute($value)
    {
        $this->recommendation = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
      * Convert this review to an array.
      *
      * @return array
      */
    public function toArray()
    {
        return collect(parent::toArray())
            ->merge([
                'author' => $this->author->toArray(),
            ])
            ->all();
    }
}

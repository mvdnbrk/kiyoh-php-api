<?php

namespace Mvdnbrk\Kiyoh\Resources;

class Review extends BaseResource
{
    /**
     * @var string
     */
    public $uuid;

    /**
     * @var \Mvdnbrk\Kiyoh\Resources\Author
     */
    public $author;

    /**
     * @var string
     */
    protected $headline;

    /**
     * @var bool
     */
    protected $recommendation;

    /**
     * @var string
     */
    protected $text;

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
     * @return void
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
     * Determine if the review has a headline.
     *
     * @return bool
     */
    public function hasHeadline()
    {
        return ! empty($this->headline);
    }

    /**
     * Determine if the review has a headline.
     *
     * @return bool
     */
    public function hasText()
    {
        return ! empty($this->text);
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
     * Set the headline for this review.
     *
     * @param  string  $value
     * @return void
     */
    public function setHeadlineAttribute($value)
    {
        $this->headline = trim($value);
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
     * Set the text for this review.
     *
     * @param  string  $value
     * @return void
     */
    public function setTextAttribute($value)
    {
        $this->text = trim($value);
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

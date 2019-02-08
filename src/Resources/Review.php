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
     * @var string
     */
    public $response;

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
     * Get created at date for this review.,
     *
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        return $this->created_at;
    }

    /**
     * Determine if the review has a response from the company.
     *
     * @return bool
     */
    public function hasResponse()
    {
        return ! empty($this->response);
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

    /**
     * Alias 'extra_options' to the 'meta' attribute.
     *
     * @param  mixed  $value
     * @return void
     */
    public function setExtraOptionsAttribute($value)
    {
        $this->meta = $value;
    }

    /**
     * Alias 'positive' to the 'comment_positive' attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setPositiveAttribute($value)
    {
        $this->comment_positive = htmlspecialchars($value);
    }

    /**
     * Alias 'negative' to the 'comment_negative' attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setNegativeAttribute($value)
    {
        $this->comment_negative = htmlspecialchars($value);
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
     * Alias 'reaction' to the 'respone' attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setReactionAttribute($value)
    {
        $this->response = htmlspecialchars($value);
    }

    /**
     * Set the recommendation for this review.
     *
     * @param  bool|string  $value
     * @return void
     */
    public function setRecommendationAttribute($value)
    {
        $this->recommendation = collect([
            'Ja' => true,
            'Yes' => true,
            '1' => true,
            'Nee' => false,
            'No' => false,
            '0' => false,
        ])->get($value);
    }

    /**
     * Alias for setRatingAttribute().
     *
     * @param  int|string  $value
     * @return  void
     */
    public function setTotalScoreAttribute($value)
    {
        $this->setRatingAttribute($value);
    }
}

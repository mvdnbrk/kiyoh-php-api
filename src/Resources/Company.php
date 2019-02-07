<?php

namespace Mvdnbrk\Kiyoh\Resources;

class Company extends BaseResource
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $url;

    /**
     * @var float
     */
    public $aggregate_rating;

    /**
     * @va int
     */
    public $review_count;

    /**
     * @var int
     */
    public $view_count;

    /**
     * Get the aggregate rating attribute,
     *
     * @return float
     */
    public function getAggregateRatingAttribute()
    {
        return (float) $this->aggregate_rating;
    }

    /**
     * Get the review count attribute,
     *
     * @return intt
     */
    public function getReviewCountAttribute()
    {
        return (int) $this->review_count;
    }

    /**
     * Get the view count attribute,
     *
     * @return intt
     */
    public function getViewCountAttribute()
    {
        return (int) $this->view_count;
    }

    /**
     * Sets aggregate rating for this company.
     *
     * @param  float|string  $value
     * @return  void
     */
    public function setAggregateRatingAttribute($value)
    {
        $this->aggregate_rating = (float) $value;
    }

    /**
     * Sets total review count for this company.
     *
     * @param  int|string  $value
     * @return  void
     */
    public function setReviewCountAttribute($value)
    {
        $this->review_count = (int) $value;
    }

    /**
     * Alias for setReviewCountAttribute().
     *
     * @param  int|string  $value
     * @return  void
     */
    public function setTotalReviewsAttribute($value)
    {
        $this->setReviewCountAttribute($value);
    }

    /**
     * Alias for setAggregateRatingAttribute().
     *
     * @param  float|string  $value
     * @return  void
     */
    public function setTotalScoreAttribute($value)
    {
        $this->setAggregateRatingAttribute($value);
    }

    /**
     * Sets the views for this company.
     *
     * @param  int|string  $value
     * @return  void
     */
    public function setViewCountAttribute($value)
    {
        $this->view_count = (int) $value;
    }

    /**
     * Alias for setViewsAttribute().
     *
     * @param  int|string  $value
     * @return  void
     */
    public function setTotalViewsAttribute($value)
    {
        $this->setViewCountAttribute($value);
    }
}

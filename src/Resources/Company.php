<?php

namespace Mvdnbrk\Kiyoh\Resources;

class Company extends BaseResource
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var float
     */
    protected $average_rating;

    /**
     * @var int
     */
    protected $review_count;

    /**
     * @var int
     */
    protected $recommendation_percentage;

    /**
     * Get the average rating attribute,.
     *
     * @return float
     */
    public function getAverageRatingAttribute()
    {
        return (float) $this->average_rating;
    }

    /**
     * Alias for getReviewCountAttribute().
     *
     * @return int
     */
    public function getNumberReviewsAttribute()
    {
        return $this->getReviewCountAttribute();
    }

    /**
     * Alias for getRecommendationPercentageAttribute().
     *
     * @return int
     */
    public function getPercentageRecommendationAttribute()
    {
        return $this->getRecommendationPercentageAttribute();
    }

    /**
     * Get the percentage recommendation attribute.,.
     *
     * @return int
     */
    public function getRecommendationPercentageAttribute()
    {
        return (int) $this->recommendation_percentage;
    }

    /**
     * Get the review count attribute,.
     *
     * @return int
     */
    public function getReviewCountAttribute()
    {
        return (int) $this->review_count;
    }

    /**
     * Sets aggregate rating for this company.
     *
     * @param  float|string  $value
     * @return void
     */
    public function setAverageRatingAttribute($value)
    {
        $this->average_rating = (float) $value;
    }

    /**
     * Alias for setIdAttribute().
     *
     * @param  float|string  $value
     * @return void
     */
    public function setLocationIdAttribute($value)
    {
        $this->setIdAttribute($value);
    }

    /**
     * Sets the location name for this company.
     *
     * @param  string  $value
     * @return void
     */
    public function setLocationNameAttribute($value)
    {
        $this->name = $value;
    }

    /**
     * Sets the id for this company.
     *
     * @param  float|string  $value
     * @return void
     */
    public function setIdAttribute($value)
    {
        $this->id = (int) $value;
    }

    /**
     * Alias for setReviewCountAttribute().
     *
     * @param  int|string  $value
     * @return void
     */
    public function setNumberReviewsAttribute($value)
    {
        $this->setReviewCountAttribute($value);
    }

    /**
     * Alias for setRecommendationPercentageAttribute().
     *
     * @param  int|string  $value
     * @return void
     */
    public function setPercentageRecommendationAttribute($value)
    {
        $this->setRecommendationPercentageAttribute($value);
    }

    /**
     * Sets the recommendation percentage for this company.
     *
     * @param  int|string  $value
     * @return void
     */
    public function setRecommendationPercentageAttribute($value)
    {
        $this->recommendation_percentage = (int) $value;
    }

    /**
     * Sets total review count for this company.
     *
     * @param  int|string  $value
     * @return void
     */
    public function setReviewCountAttribute($value)
    {
        $this->review_count = (int) $value;
    }
}

<?php

namespace Mvdnbrk\Kiyoh\Resources;

class Author extends BaseResource
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $locality;

    /**
     * Create a new Author instance.
     *
     * @param  array|object  $attributes
     */
    public function __construct($attributes = [])
    {
        $this->name = '';
        $this->locality = '';

        $this->fill($attributes);
    }

    /**
     * Get "city" attribute for this review.
     *
     * @return string
     */
    public function getCityAttribute()
    {
        return $this->locality;
    }

    /**
     * Get "reviewAuthor" attribute for this review.
     *
     * @return string
     */
    public function getReviewAuthorAttribute()
    {
        return $this->name;
    }

    /**
     * Determine if the author has a name.
     *
     * @return bool
     */
    public function hasName()
    {
        return ! empty($this->name);
    }

    /**
     * Determine if the author has a locality.
     *
     * @return bool
     */
    public function hasLocality()
    {
        return ! empty($this->locality);
    }

    /**
     * Sets the name of this author.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        if (empty($value)) {
            return;
        }

        $this->name = trim($value);
    }

    /**
     * Sets the locality for this author.
     *
     * @param  string  $value
     * @return void
     */
    public function setLocalityAttribute($value)
    {
        if (empty($value)) {
            return;
        }

        $this->locality = trim($value);
    }

    /**
     * Alias for setLocalityAttribute().
     *
     * @param  string  $value
     * @return void
     */
    public function setCityAttribute($value)
    {
        $this->setLocalityAttribute($value);
    }

    /**
     * Alias for setNameAttribute().
     *
     * @param  string  $value
     * @return void
     */
    public function setReviewAuthorAttribute($value)
    {
        $this->setNameAttribute($value);
    }
}

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
    public function setPlaceAttribute($value)
    {
        $this->setLocalityAttribute($value);
    }
}

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
     * Alias 'place' to the 'locality' attribute.
     *
     * @param  string  $value
     * @return  void
     */
    public function setPlaceAttribute($value)
    {
        $this->locality = $value;
    }
}

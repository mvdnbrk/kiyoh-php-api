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
     * @var array
     */
    public $reviews;

    /**
     * @var int
     */
    public $totalViews;

    /**
     * @var int
     */
    public $totalReviews;

    /**
     * @var float
     */
    public $totalScore;
}

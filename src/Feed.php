<?php

namespace Mvdnbrk\Kiyoh;

use Mvdnbrk\Kiyoh\Client;
use Mvdnbrk\Kiyoh\Resources\Review;
use Mvdnbrk\Kiyoh\Resources\Company;

class Feed
{
    /**
     * @var \Mvdnbrk\Kiyoh\Client
     */
    protected $apiClient;

    /**
     * The maximum number of reviews to fetch.
     *
     * @var int|string
     */
    protected $limit;

    /**
     * @var \Mvdnbrk\Kiyoh\Resources\Company;
     */
    public $company;


    /**
     * @var \Tightenco\Collect\Support\Collection
     */
    public $reviews;

    /**
     * Create a new Feed instance.
     *
     * @param  \Mvdnbrk\Kiyoh\Client  $client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;

        $this->limit = 10;

        $this->company = new Company();
        $this->reviews = collect();
    }

    /**
     * Get the feed.
     *
     * @return $this
     */
    public function get()
    {
        $response = $this->apiClient->performHttpCall([
            'reviewcount' => $this->getLimit(),
            'showextraquestions' => 0,
        ]);

        $this->company->fill($response['company']);

        collect(
            $this->getLimit() > 1 ? $response['review_list']['review'] : $response['review_list']
        )->each(function ($review) {
            $this->reviews->push(new Review(
                collect($review)
                    ->put('created_at', $review['customer']['date'] ?? null)
                    ->filter()
                    ->all()
            ));
        });

        return $this;
    }

    /**
     * Get the maximum numbers of reviews.
     *
     * @return int|string
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets the limit to "all".
     *
     * @return $this
     */
    public function all()
    {
        $this->limit = 'all';

        return $this;
    }

    /**
     * Set the maximum number of reviews to fetch.
     *
     * @param  int  $value
     * @return $this
     */
    public function limit($value)
    {
        if (is_int($value) && $value >= 0) {
            $this->limit = $value;
        }

        return $this;
    }
}

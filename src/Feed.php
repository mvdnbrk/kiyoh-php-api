<?php

namespace Mvdnbrk\Kiyoh;

use Mvdnbrk\Kiyoh\Client;
use Mvdnbrk\Kiyoh\Resources\Company;

class Feed
{
    /**
     * @var \Mvdnbrk\Kiyoh\Client
     */
    protected $apiClient;

    /**
     * @var \Mvdnbrk\Kiyoh\Resources\Company;
     */
    public $company;

    /**
     * The maximum number of reviews to fetch.
     *
     * @var int
     */
    public $limit;

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

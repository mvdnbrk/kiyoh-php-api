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
            'reviewcount' => $this->limit,
            'showextraquestions' => 0,
        ]);

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
        if ($value >= 0) {
            $this->limit = $value;
        }

        return $this;
    }
}

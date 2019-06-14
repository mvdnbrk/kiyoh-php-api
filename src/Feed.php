<?php

namespace Mvdnbrk\Kiyoh;

use Mvdnbrk\Kiyoh\Client;
use Mvdnbrk\Kiyoh\Support\Str;
use Mvdnbrk\Kiyoh\Resources\Review;
use Mvdnbrk\Kiyoh\Resources\Company;
use Tightenco\Collect\Support\Collection;

class Feed
{
    /**
     * @var \Mvdnbrk\Kiyoh\Client
     */
    protected $apiClient;

    /**
     * The maximum number of reviews to fetch.
     *
     * @var int
     */
    protected $limit;

    /**
     * Include migrated reviews. (defaults to false).
     *
     * @var bool
     */
    protected $withMigrated;

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
        $this->withMigrated = false;

        $this->company = new Company();
        $this->reviews = new Collection();
    }

    /**
     * Get the feed.
     *
     * @return $this
     */
    public function get()
    {
        $response = collect(
            $this->apiClient->performHttpCall([
                'limit' => $this->getLimit(),
            ])
        );

        $this->company->fill(
            $this->getCompanyAttributes($response)
        );

        collect($response->get('reviews'))
            ->when(! $this->withMigrated, function ($collection) {
                return $collection->reject(function ($review) {
                    return Str::startsWith($review['reviewId'], 'KIYNL-');
                });
            })->each(function ($review) {
                $this->reviews->push(
                    new Review($review)
                );
            });

        return $this;
    }

    /**
     * Get the maximum numbers of reviews.
     *
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Include migrated reviews in the feed.
     *
     * @param  bool  $value
     * @return $this
     */
    public function withMigrated($value = true)
    {
        $this->withMigrated = (bool) $value;

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
        if (is_numeric($value) && $value >= 0) {
            $this->limit = (int) $value;
        }

        return $this;
    }

    /**
     * Get the company attributes from the collection.
     *
     * @param  \Tightenco\Collect\Support\Collection  $collection
     * @return array
     */
    protected function getCompanyAttributes($collection)
    {
        return $collection->intersectByKeys([
            'locationId' => '',
            'locationName' => '',
            'averageRating' => '',
            'numberReviews' => '',
            'percentageRecommendation' => '',
        ])->all();
    }
}

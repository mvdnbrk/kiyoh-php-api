<?php

namespace Mvdnbrk\Kiyoh;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Composer\CaBundle\CaBundle;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use Mvdnbrk\Kiyoh\Exceptions\KiyohException;

class Client
{
    /**
     * Endpoint of the remote API.
     */
    const API_ENDPOINT = 'https://www.kiyoh.com/v1/review/feed.json';

    /**
     * @var string
     */
    protected $apiEndpoint = self::API_ENDPOINT;
    const TIMEOUT = 10;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */

    /**
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * @var \Mvdnbrk\Kiyoh\Feed
     */
    public $feed;

    /**
     * Create a new Client instance.
     */
    public function __construct()
    {
        $this->httpClient = new HttpClient([
            RequestOptions::VERIFY => CaBundle::getBundledCaBundlePath()
            RequestOptions::TIMEOUT => self::TIMEOUT,
        ]);

        $this->feed = new Feed($this);
    }

    /**
     * Build a query string.
     *
     * @param  array  $filters
     * @return string
     */
    protected function buildQueryString($filters)
    {
        return '?'.http_build_query($filters);
    }

    /**
     * Get query filters.
     *
     * @param  array  $filters
     * @return array
     */
    protected function getFilters($filters)
    {
        return array_merge($filters, [
            'hash' => $this->apiKey,
        ]);
    }

    /**
     * Performs a HTTP call to the API endpoint.
     *
     * @param  array  $filters
     * @return object
     * @throws \Mvdnbrk\Kiyoh\Exceptions\KiyohException
     */
    public function performHttpCall($filters = [])
    {
        if (empty($this->apiKey)) {
            throw new KiyohException('You have not set an API key. Please use setApiKey() to set the API key.');
        }

        $request = new Request('GET', $this->apiEndpoint.$this->buildQueryString(
            $this->getFilters($filters)
        ));

        try {
            $response = $this->httpClient->send($request, ['http_errors' => false]);
        } catch (GuzzleException $e) {
            throw new KiyohException($e->getMessage(), $e->getCode());
        }

        if (! $response) {
            throw new KiyohException('No API response received.');
        }

        return $this->parseResponse($response);
    }

    /**
     * Parse the PSR-7 Response body.
     *
     * @param  \Psr\Http\Message\ResponseInterface  $response
     * @return object
     */
    public function parseResponse($response)
    {
        $body = $response->getBody()->getContents();

        $object = @json_decode($body, true);

        if (json_last_error() != JSON_ERROR_NONE) {
            throw new KiyohException("Unable to decode response: '{$body}'.");
        }

        if (isset($object['httpCode'])) {
            throw new KiyohException($object['detailedError']['message'], $object['httpCode']);
        }

        return $object;
    }

    /**
     * Sets the API key.
     *
     * @param  string  $value
     * @return \Mvdnbrk\Kiyoh\Client
     */
    public function setApiKey($value)
    {
        $this->apiKey = trim($value);

        return $this;
    }
}

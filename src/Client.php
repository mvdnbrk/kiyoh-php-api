<?php

namespace Mvdnbrk\Kiyoh;

use Composer\CaBundle\CaBundle;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Mvdnbrk\Kiyoh\Exceptions\KiyohException;

class Client
{
    /**
     * Endpoint of the remote API.
     */
    const API_ENDPOINT = 'https://www.kiyoh.com/v1/review/feed.json';

    /**
     * Default response timeout (in seconds).
     */
    const TIMEOUT = 10;

    /**
     * @var string
     */
    protected $apiEndpoint = self::API_ENDPOINT;

    /**
     * @var string
     */
    protected $apiKey;

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
     *
     * @return void
     */
    public function __construct(ClientInterface $httpClient = null)
    {
        $this->httpClient = $httpClient ?: new HttpClient([
            RequestOptions::VERIFY => CaBundle::getBundledCaBundlePath(),
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
     *
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

        if (! $response || $response->getBody() === null) {
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
            throw new KiyohException($object['detailedError'][0]['message'], $object['httpCode']);
        }

        return $object;
    }

    /**
     * Sets the API key.
     *
     * @param  string  $value
     * @return $this
     */
    public function setApiKey($value)
    {
        $this->apiKey = trim($value);

        return $this;
    }
}

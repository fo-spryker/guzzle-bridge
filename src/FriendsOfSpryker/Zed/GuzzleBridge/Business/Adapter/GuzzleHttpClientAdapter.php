<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace FriendsOfSpryker\Zed\GuzzleBridge\Business\Adapter;

use FriendsOfSpryker\Zed\GuzzleBridge\Business\Exception\GuzzleRequestException;
use FriendsOfSpryker\Zed\GuzzleBridge\Business\Response\GuzzleResponse;
use FriendsOfSpryker\Zed\GuzzleBridge\Business\Response\GuzzleResponseInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

class GuzzleHttpClientAdapter implements GuzzleHttpClientAdapterInterface
{
    protected const DEFAULT_TIMEOUT = 45;
    protected const HEADER_CONTENT_TYPE_KEY = 'Content-Type';
    protected const HEADER_CONTENT_TYPE_VALUE = 'application/x-www-form-urlencoded';

    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzleHttpClient;

    public function __construct()
    {
        $this->guzzleHttpClient = new Client([
            RequestOptions::TIMEOUT => static::DEFAULT_TIMEOUT,
            RequestOptions::HEADERS => [
                static::HEADER_CONTENT_TYPE_KEY => static::HEADER_CONTENT_TYPE_VALUE,
            ],
        ]);
    }

    /**
     * @param string $url
     * @param array $formParams
     *
     * @throws \FriendsOfSpryker\Zed\GuzzleBridge\Business\Exception\GuzzleRequestException
     *
     * @return \FriendsOfSpryker\Zed\GuzzleBridge\Business\Response\GuzzleResponseInterface
     */
    public function post(string $url, array $formParams = []): GuzzleResponseInterface
    {
        try {
            $options = [
                RequestOptions::FORM_PARAMS => $formParams,
            ];
            $response = $this->guzzleHttpClient->post($url, $options);
        } catch (RequestException $requestException) {
            throw new GuzzleRequestException(
                $this->createGuzzleResponse($requestException->getResponse()),
                $requestException->getMessage(),
                $requestException->getCode(),
                $requestException
            );
        }

        return $this->createGuzzleResponse($response);
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \FriendsOfSpryker\Zed\GuzzleBridge\Business\Response\GuzzleResponse
     */
    protected function createGuzzleResponse(?ResponseInterface $response): GuzzleResponse
    {
        if ($response === null) {
            return new GuzzleResponse();
        }

        return new GuzzleResponse(
            $response->getBody(),
            $response->getHeaders()
        );
    }
}

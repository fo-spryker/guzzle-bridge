<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace FriendsOfSpryker\Zed\GuzzleBridge\Business;

use FriendsOfSpryker\Zed\GuzzleBridge\Business\Response\GuzzleResponseInterface;

interface GuzzleBridgeFacadeInterface
{
    /**
     * Specification:
     *  - Performs http post request to url with params via GuzzleHttpClient.
     *
     * @api
     *
     * @param string $url
     * @param array $formParams
     *
     * @throws \FriendsOfSpryker\Zed\GuzzleBridge\Business\Exception\GuzzleRequestException
     *
     * @return \FriendsOfSpryker\Zed\GuzzleBridge\Business\Response\GuzzleResponseInterface
     */
    public function post(string $url, array $formParams = []): GuzzleResponseInterface;
}

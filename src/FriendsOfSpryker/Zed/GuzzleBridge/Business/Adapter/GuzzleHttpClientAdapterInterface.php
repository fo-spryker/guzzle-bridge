<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace FriendsOfSpryker\Zed\GuzzleBridge\Business\Adapter;

use FriendsOfSpryker\Zed\GuzzleBridge\Business\Response\GuzzleResponseInterface;

interface GuzzleHttpClientAdapterInterface
{
    /**
     * @param string $url
     * @param array $formParams
     *
     * @throws \FriendsOfSpryker\Zed\GuzzleBridge\Business\Exception\GuzzleRequestException
     *
     * @return \FriendsOfSpryker\Zed\GuzzleBridge\Business\Response\GuzzleResponseInterface
     */
    public function post(string $url, array $formParams = []): GuzzleResponseInterface;
}

<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace FriendsOfSpryker\Zed\GuzzleBridge\Business;

use FriendsOfSpryker\Zed\GuzzleBridge\Business\Adapter\GuzzleHttpClientAdapter;
use FriendsOfSpryker\Zed\GuzzleBridge\Business\Adapter\GuzzleHttpClientAdapterInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FriendsOfSpryker\Zed\GuzzleBridge\GuzzleBridgeConfig getConfig()
 */
class GuzzleBridgeBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FriendsOfSpryker\Zed\GuzzleBridge\Business\Adapter\GuzzleHttpClientAdapterInterface
     */
    public function createGuzzleHttpClientAdapter(): GuzzleHttpClientAdapterInterface
    {
        return new GuzzleHttpClientAdapter();
    }
}

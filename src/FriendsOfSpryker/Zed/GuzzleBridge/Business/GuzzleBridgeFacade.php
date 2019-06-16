<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace FriendsOfSpryker\Zed\GuzzleBridge\Business;

use FriendsOfSpryker\Zed\GuzzleBridge\Business\Response\GuzzleResponseInterface;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FriendsOfSpryker\Zed\GuzzleBridge\Business\GuzzleBridgeBusinessFactory getFactory()
 */
class GuzzleBridgeFacade extends AbstractFacade implements GuzzleBridgeFacadeInterface
{
    /**
     * {@inheritdoc}
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
    public function post(string $url, array $formParams = []): GuzzleResponseInterface
    {
        return $this->getFactory()
            ->createGuzzleHttpClientAdapter()
            ->post($url, $formParams);
    }
}

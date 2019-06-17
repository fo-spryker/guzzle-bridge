<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace FriendsOfSpryker\Zed\GuzzleBridge\Business\Exception;

use Exception;
use FriendsOfSpryker\Zed\GuzzleBridge\Business\Response\GuzzleResponseInterface;
use Throwable;

class GuzzleRequestException extends Exception
{
    /**
     * @var \FriendsOfSpryker\Zed\GuzzleBridge\Business\Response\GuzzleResponseInterface
     */
    protected $response;

    /**
     * @param \FriendsOfSpryker\Zed\GuzzleBridge\Business\Response\GuzzleResponseInterface $response
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(
        GuzzleResponseInterface $response,
        $message = "",
        $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->response = $response;
    }

    /**
     * @return \FriendsOfSpryker\Zed\GuzzleBridge\Business\Response\GuzzleResponseInterface
     */
    public function getResponse(): GuzzleResponseInterface
    {
        return $this->response;
    }
}

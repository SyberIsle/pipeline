<?php

/**
 * @file
 * Contains SyberIsle\Pipeline\Stage\Callback
 */

namespace SyberIsle\Pipeline\Stage;

use SyberIsle\Pipeline\Stage;

/**
 * Callback stage
 *
 * @package SyberIsle\Pipeline\Stage
 */
class Callback implements Stage
{
    /**
     * @var callable
     */
    private $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * {@inheritDoc}
     */
    public function process($payload)
    {
        return call_user_func_array($this->callback, array($payload));
    }
}

<?php

namespace SyberIsle\Pipeline\Stage;

use SyberIsle\Pipeline\Stage;

class Callback implements Stage
{
    /**
     * @var Callable
     */
    private $callback;

    public function __construct($callback)
    {
        $this->callback = $callback;
    }

    /**
     * Runs the payload through the callback
     *
     * @param $payload
     * @return mixed
     */
    public function process($payload)
    {
        return call_user_func_array($this->callback, array($payload));
    }
}
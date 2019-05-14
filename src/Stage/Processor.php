<?php

/**
 * @file
 * Contains SyberIsle\Pipeline\Stage\Processor
 */

namespace SyberIsle\Pipeline\Stage;

use SyberIsle\Pipeline\Pipeline;
use SyberIsle\Pipeline\Processor\FingersCrossed;
use SyberIsle\Pipeline\Stage;

/**
 * Proxy to another processor
 *
 * @package SyberIsle\Pipeline\Stage
 */
class Processor implements Stage
{
    /**
     * @var Pipeline
     */
    private $pipeline;

    /**
     * @var FingersCrossed|Processor
     */
    private $processor;

    public function __construct(Pipeline $pipeline, Processor $processor = null)
    {
        $this->pipeline  = $pipeline;
        $this->processor = $processor ? $processor : new FingersCrossed();
    }

    /**
     * Runs the payload through the callback
     *
     * @param mixed $payload
     * @return mixed
     */
    public function process($payload)
    {
        return $this->processor->process($this->pipeline, $payload);
    }
}
<?php

/**
 * @file
 * Contains SyberIsle\Pipeline\Processor\Interruptible
 */

namespace SyberIsle\Pipeline\Processor;

use SyberIsle\Pipeline\Pipeline;
use SyberIsle\Pipeline\Processor;

/**
 * An interruptible processor
 *
 * Useful if you need to check for a value and not continue
 *
 * @package SyberIsle\Pipeline\Processor
 */
class Interruptible implements Processor
{
    /**
     * The check for whether or not to interrupt
     *
     * @var callable
     */
    private $interrupt;

    /**
     * Interruptible Processor constructor.
     *
     * @param callable $interrupt
     */
    public function __construct(callable $interrupt)
    {
        $this->interrupt = $interrupt;
    }

    /**
     * {@inheritdoc}
     */
    public function process(Pipeline $pipeline, $payload)
    {
        foreach ($pipeline->stages() as $stage) {
            $payload = $stage->process($payload);

            if (call_user_func($this->interrupt, $payload) !== true) {
                return $payload;
            }
        }

        return $payload;
    }
}

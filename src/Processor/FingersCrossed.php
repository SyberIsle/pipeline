<?php

/**
 * @file
 * Contains SyberIsle\Pipeline\Processor\FingersCrossed
 */

namespace SyberIsle\Pipeline\Processor;

use SyberIsle\Pipeline\Pipeline;
use SyberIsle\Pipeline\Processor;

/**
 * Processor that runs the stages.
 *
 * @package SyberIsle\Pipeline\Processor
 */
class FingersCrossed implements Processor
{
    /**
     * {@inheritDoc}
     */
    public function process(Pipeline $pipeline, $payload)
    {
        foreach ($pipeline as $stage) {
            $payload = $stage->process($payload);
        }

        return $payload;
    }
}

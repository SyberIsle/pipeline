<?php

/**
 * @file
 * Contains SyberIsle\Pipeline\Processor
 */

namespace SyberIsle\Pipeline;

interface Processor
{
    /**
     * @param Pipeline $pipeline
     * @param mixed    $payload
     * @return mixed
     */
    public function process(Pipeline $pipeline, $payload);
}
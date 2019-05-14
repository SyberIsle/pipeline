<?php

/**
 * @file
 * Contains SyberIsle\Pipeline\Stage
 */

namespace SyberIsle\Pipeline;

interface Stage
{
    /**
     * Processes the payload for this stage
     *
     * @param mixed $payload
     * @return mixed
     */
    public function process($payload);
}
<?php

namespace SyberIsle\Pipeline;

interface Stage
{
    /**
     * Processes the payload for this stage
     *
     * @param $payload
     * @return mixed
     */
    public function process($payload);
}
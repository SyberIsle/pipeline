<?php

namespace SyberIsle\Pipeline\Processor;

use SyberIsle\Pipeline\Pipeline;
use SyberIsle\Pipeline\Processor;

class FingersCrossed implements Processor
{
    public function process(Pipeline $pipeline, $payload)
    {
        foreach ($pipeline->stages() as $stage) {
            $payload = $stage->process($payload);
        }

        return $payload;
    }
}
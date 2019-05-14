<?php

/**
 * @file
 * Contains SyberIsle\Pipeline\Pipeline
 */

namespace SyberIsle\Pipeline;

interface Pipeline
    extends \IteratorAggregate
{
    /**
     * Pipes the stage in to the pipeline
     *
     * @param Pipeline|Stage|callable $stage
     * @return Pipeline
     */
    public function pipe($stage): Pipeline;

    /**
     * @return array<Stage>
     */
    public function stages(): array;
}
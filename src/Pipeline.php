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
     * @param $stage
     * @return self
     */
    public function pipe($stage);

    /**
     * @return array<Stage>
     */
    public function stages();
}
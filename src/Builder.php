<?php

/**
 * @file
 * Contains SyberIsle\Pipeline\Builder
 */

namespace SyberIsle\Pipeline;

interface Builder
{
    /**
     * Add a stage
     *
     * @param callable|Stage $stage
     * @throws \InvalidArgumentException When not a callable or a Stage object
     * @return Builder
     */
    public function add($stage): Builder;

    /**
     * Build the pipeline object
     *
     * @param string|null $class
     * @return Pipeline
     */
    public function build($class = null): Pipeline;
}
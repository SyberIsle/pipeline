<?php

/**
 * @file
 * Contains SyberIsle\Pipeline\Pipeline\Simple
 */

namespace SyberIsle\Pipeline\Pipeline;

use SyberIsle\Pipeline\Pipeline;
use SyberIsle\Pipeline\Stage;
use SyberIsle\Pipeline\Stage\Callback;

/**
 * Simple pipeline
 *
 * @package SyberIsle\Pipeline\Pipeline
 */
class Simple implements Pipeline
{
    /**
     * @var array
     */
    protected $stages = array();

    /**
     * Simple Pipeline constructor.
     *
     * @param array <Pipeline|Stage|callable> $stages
     */
    public function __construct($stages = null)
    {
        foreach ((array)$stages as $stage) {
            $this->handleStage($this->stages, $stage);
        }
    }

    /**
     * Create a new pipeline with an appended stage.
     *
     * @param Pipeline|Stage|callable $stage
     * @return Pipeline
     */
    public function pipe($stage): Pipeline
    {
        $pipeline = clone $this;
        $this->handleStage($pipeline->stages, $stage);

        return $pipeline;
    }

    /**
     * Implement Iterator
     *
     * @return \Generator|\Traversable
     */
    public function getIterator()
    {
        foreach ($this->stages as $stage) {
            yield $stage;
        }
    }

    /**
     * Returns the stages
     *
     * @return array<Stage>
     */
    public function stages(): array
    {
        return $this->stages;
    }

    /**
     * Handles merging or converting the stage to a callback
     *
     * @param array                   $stages
     * @param Pipeline|Stage|callable $stage
     */
    protected function handleStage(&$stages, $stage)
    {
        if ($stage instanceof Pipeline) {
            $stages = array_merge($stages, $stage->stages());
        } else {
            $stages[] = is_callable($stage) ? new Callback($stage) : $stage;
        }
    }
}

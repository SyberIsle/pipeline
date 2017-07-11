<?php

namespace SyberIsle\Pipeline\Pipeline;

use SyberIsle\Pipeline\Pipeline;
use SyberIsle\Pipeline\Stage;
use SyberIsle\Pipeline\Stage\Callback;

class Simple implements Pipeline
{
    /**
     * @var array
     */
    protected $stages = array();

    /**
     * BasicPipeline constructor.
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
     * @return static
     */
    public function pipe($stage)
    {
        $pipeline = clone $this;
        $this->handleStage($pipeline->stages, $stage);

        return $pipeline;
    }

    /**
     * Returns the stages
     *
     * @return mixed|null
     */
    public function stages()
    {
        return $this->stages;
    }

    /**
     * Handles merging or converting the stage to a callback
     *
     * @param array                   $stages
     * @param Pipeline|Stage|callable $stage
     */
    private function handleStage(&$stages, $stage)
    {
        if ($stage instanceof Pipeline) {
            $stages = array_merge($stages, $stage->stages());
        } else {
            $stages[] = is_callable($stage) ? new Callback($stage) : $stage;
        }
    }
}
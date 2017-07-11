<?php

namespace SyberIsle\Pipeline;

interface Pipeline
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
<?php

/**
 * @file
 * Contains SyberIsle\Pipeline\Pipeline\SimpleBuilder
 */

namespace SyberIsle\Pipeline\Pipeline;

use SyberIsle\Pipeline\Builder;
use SyberIsle\Pipeline\Pipeline;
use SyberIsle\Pipeline\Stage;

/**
 * Builder for a simple pipeline
 *
 * @package SyberIsle\Pipeline\Pipeline
 */
class SimpleBuilder implements Builder
{
    /**
     * @var array List of stages
     */
    private $stages = array();

    /**
     * {@inheritdoc}
     */
    public function add($stage): Builder
    {
        if ($stage instanceof Stage) {
            $this->stages[] = $stage;
        } elseif (is_callable($stage)) {
            $this->stages[] = new Stage\Callback($stage);
        } else {
            throw new \InvalidArgumentException("You may only pipe SyberIsle\\Pipeline\\Stage objects or callables");
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function build($class = null): Pipeline
    {
        $class = $class ?: Simple::class;

        return new $class($this->stages);
    }
}

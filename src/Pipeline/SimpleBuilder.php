<?php

namespace SyberIsle\Pipeline\Pipeline;

use SyberIsle\Pipeline\Builder;
use SyberIsle\Pipeline\Stage;

class SimpleBuilder implements Builder
{
    /**
     * @var array List of stages
     */
    private $stages = array();

    /**
     * {@inheritdoc}
     */
    public function add($stage)
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
    public function build($class = null)
    {
        $class = $class ?: Simple::class;

        return new $class($this->stages);
    }
}
<?php

namespace spec\SyberIsle\Pipeline;

use PhpSpec\ObjectBehavior;
use SyberIsle\Pipeline\Pipeline;
use SyberIsle\Pipeline\Pipeline\Simple;

class PipelineSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf(Simple::class);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Pipeline::class);
    }

    function it_should_pipe_operation()
    {
        $operation = function () {
        };
        $this->pipe($operation)->shouldHaveType(Pipeline::class);
        $this->pipe($operation)->shouldNotBe($this);
    }
}
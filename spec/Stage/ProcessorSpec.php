<?php

namespace spec\SyberIsle\Pipeline\Stage;

use PhpSpec\ObjectBehavior;
use SyberIsle\Pipeline\Pipeline\Simple;
use SyberIsle\Pipeline\Stage\Processor;
use SyberIsle\Pipeline\Stub\AddOneStage;
use SyberIsle\Pipeline\Stub\TimesTwoStage;

class ProcessorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf(Processor::class);
    }

    public function it_should_process()
    {
        $p = new Simple([new AddOneStage(), new TimesTwoStage()]);

        $this->beConstructedWith($p);

        $this->process(1)->shouldBe(4);
    }
}
<?php

namespace spec\SyberIsle\Pipeline;

use PhpSpec\ObjectBehavior;
use SyberIsle\Pipeline\Pipeline\Simple;
use SyberIsle\Pipeline\Processor\FingersCrossed;
use SyberIsle\Pipeline\Stub\AddOneStage;
use SyberIsle\Pipeline\Stub\TimesTwoStage;

class ProcessorSpec extends ObjectBehavior
{
	public function let()
	{
		$this->beAnInstanceOf(FingersCrossed::class);
	}

	public function it_should_process()
	{
		$p = new Simple([new AddOneStage(), new TimesTwoStage()]);

		$this->process($p, 1)->shouldBe(4);
	}

	public function it_should_be_composable()
	{
		$p1 = new Simple([new AddOneStage(), new TimesTwoStage()]);
		$p2 = new Simple([$p1, new TimesTwoStage()]);

		$this->process($p2, 1)->shouldBe(8);
	}
}
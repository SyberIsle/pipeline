<?php

namespace spec\SyberIsle\Pipeline;

use PhpSpec\ObjectBehavior;
use SyberIsle\Pipeline\Stage\Callback;

class StageSpec extends ObjectBehavior
{
	public function let()
	{
		$this->beAnInstanceOf(Callback::class);
	}

	public function it_should_process()
	{
		$this->beConstructedWith(function($p) { return $p + 1; });
		$this->process(1)->shouldBe(2);
	}
}
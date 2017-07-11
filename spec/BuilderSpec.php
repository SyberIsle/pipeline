<?php

namespace spec\SyberIsle\Pipeline;

use PhpSpec\ObjectBehavior;
use SyberIsle\Pipeline\Pipeline;
use SyberIsle\Pipeline\Pipeline\SimpleBuilder;
use SyberIsle\Pipeline\Stub\TimesTwoStage;

class BuilderSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf(SimpleBuilder::class);
    }

    public function it_should_build_a_pipeline()
    {
        $this->build()->shouldHaveType(Pipeline::class);
    }

    public function it_should_collect_stages_for_a_pipeline()
    {
        $this->add(function () {
            return 1;
        });
        $this->add(new TimesTwoStage());
        $stages = $this->build()->stages();
    }

    public function it_should_have_a_fluent_build_interface()
    {
        $this->add(function () {
        })->shouldBe($this);
    }

    public function it_throws_an_exception_on_invalid_stages()
    {
        $this->shouldThrow(\InvalidArgumentException::class)->during('add', [new \stdClass()]);
    }
}
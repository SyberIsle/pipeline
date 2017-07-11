<?php

namespace spec\SyberIsle\Pipeline\Processor;

use PhpSpec\ObjectBehavior;
use SyberIsle\Pipeline\Pipeline\Simple;
use SyberIsle\Pipeline\Processor;

class InterruptibleSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Processor::class);
    }

    public function let()
    {
        $this->beConstructedWith(function ($p) {
            return $p < 10;
        });
    }

    public function it_should_interrupt()
    {
        $this->process(
            new Simple([
                function ($payload) {
                    return $payload + 2;
                },
                function ($payload) {
                    return $payload * 10;
                },
                function ($payload) {
                    return $payload * 10;
                }
            ]),
            5)->shouldBe(70);
    }

    public function it_should_not_interrupt()
    {
        $this->process(
            new Simple([
                function ($payload) {
                    return $payload + 2;
                },
                function ($payload) {
                    return $payload + 1;
                },
                function ($payload) {
                    return $payload + 1;
                }
            ]),
            5)->shouldBe(9);
    }
}
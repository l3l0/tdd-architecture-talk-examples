<?php

namespace spec\Cocoders;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CalculatorSpec extends ObjectBehavior
{
    function it_adds_two_values()
    {
        $this->add(1, 2)->shouldBe(3);
        $this->add(1, 1)->shouldBe(2);
        $this->add(-1, 1)->shouldBe(0);
    }
}

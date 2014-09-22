<?php

namespace spec\Cocoders;

use Cocoders\PhpSpecCollaborator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PhpSpecExampleSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('/home/l3l0/path');
    }

    function it_throws_exception_when_collaborator_build_returns_false(PhpSpecCollaborator $collaborator)
    {
        $this->shouldThrow(new \InvalidArgumentException())->duringShowFile($key = 'test');
        $this->shouldThrow('\InvalidArgumentException')->duringShowFile($key = 'test');
    }

    function it_builds_something(PhpSpecCollaborator $collaborator)
    {
        $this->showFile('test123')->shouldBe([
            'test123',
            'test123a',
            'test123aa'
        ]);
    }
}

<?php

namespace spec\Cocoders\Timesheet\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReportPeriodSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('createPeriod', [new \DateTime('2014-01-12'), new \DateTime('2014-02-01')]);
    }

    function it_represents_time_period_for_report_will_be_generated()
    {
        $this->getStartDate()->shouldBeLike(new \DateTime('2014-01-12'));
        $this->getEndDate()->shouldBeLike(new \DateTime('2014-02-01'));
    }

    function it_cannot_be_created_with_end_date_before_start_date()
    {
        $this
            ->shouldThrow('\InvalidArgumentException')
            ->duringCreatePeriod(new \DateTime('2014-04-12'), new \DateTime('2014-03-02'))
        ;
        $this
            ->shouldThrow('\InvalidArgumentException')
            ->duringCreatePeriod(new \DateTime('2014-03-01 12:50:00'), new \DateTime('2014-03-01 12:49:59'))
        ;
    }
}

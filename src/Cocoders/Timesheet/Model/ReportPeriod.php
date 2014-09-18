<?php

namespace Cocoders\Timesheet\Model;

final class ReportPeriod
{
    /**
     * @var \DateTimeInterface
     */
    private $startDate;
    /**
     * @var \DateTimeInterface
     */
    private $endDate;

    private function __construct(\DateTimeInterface $startDate, \DateTimeInterface $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public static function createPeriod(\DateTimeInterface $startDate, \DateTimeInterface $endDate)
    {
        if ($endDate < $startDate) {
            throw new \InvalidArgumentException('Finish date cannot be before start date');
        }

        return new self($startDate, $endDate);
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }
}

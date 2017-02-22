<?php
namespace AB\MyDate;


class MyDateDiff
{
    /**
     * @var int
     */
    private $startYear;
    /**
     * @var int
     */
    private $endYear;

    /**
     * @var int
     */
    private $startMonth;
    /**
     * @var int
     */
    private $endMonth;

    /**
     * @var int
     */
    private $startDay;
    /**
     * @var int
     */
    private $endDay;

    public function __construct($start, $end)
    {
        $this->startYear = $start['year'];
        $this->endYear = $end['year'];
        $this->startMonth = $start['month'];
        $this->endMonth = $end['month'];
        $this->startDay = $start['day'];
        $this->endDay = $end['day'];
    }

    /**
     * Calculates and return difference between two different years
     *
     * @return int $yearsDiff
     */
    public function getYearDiff()
    {
        $yearsDiff = $this->startYear - $this->endYear;

        if ($this->startYear == $this->endYear) {
            return $this->toPositiveValue($yearsDiff);
        } elseif ($this->startMonth > $this->endMonth) {
            $yearsDiff += 1;
        }

        return $this->toPositiveValue($yearsDiff);
    }

    /**
     * Calculates and return difference between two different months
     *
     * @return int $monthDiff
     */
    public function getMonthDiff()
    {
        $monthDiff = $this->startMonth - $this->endMonth;

        if ($this->startDay > $this->endDay) {
            $monthDiff += 1;
        } elseif ($this->startMonth == $this->startMonth) {
            return $this->toPositiveValue($monthDiff);
        }

        if ($this->startMonth >= $this->endMonth) {
            $monthDiff = 12 - $monthDiff;
        }

        return $this->toPositiveValue($monthDiff);
    }

    /**
     * Calculates and return difference between two different days
     *
     * @return int $dayDiff
     */
    public function getDayDiff()
    {
        $dayDiff = $this->startDay - $this->endDay;

        if ($this->startDay > $this->endDay) {
            $dayDiff = CalendarConst::DAYS_IN_MONTH[(int)$this->endMonth] - $dayDiff;
        }

        return $this->toPositiveValue($dayDiff);
    }

    /**
     * Changes given $value to positive if negative is given
     *
     * @param $value
     * @return int $value
     */
    private function toPositiveValue($value)
    {
        if($value < 0 ){
            $value *= -1;
        }

        return $value;
    }
}
<?php
namespace AB\MyDate\Type;


use AB\MyDate\CalendarConst;

class DayStampType
{
    const BASE_YEAR = 1970;
    const DAYS_IN_YEAR = 365;

    /**
     * @var int
     */
    private $years;

    /**
     * @var int
     */
    private $months;

    /**
     * @var int
     */
    private $days;

    /**
     * @var bool
     */
    private $leap;

    /**
     * @var int
     */
    private $dayStamp;

    public function __construct(array $date)
    {
        $this->years = $date['year'] - self::BASE_YEAR;
        $this->months = $date['month'] - 1;
        $this->days = $date['day'] - 1;
        $this->leap = $this->isYearLeap($date['year']);

        $this->dayStamp = $this->calculateDayStamp();
    }

    /**
     * Calculates and returns number of days since self::BASE_YEAR
     *
     * @return int|mixed
     */
    private function calculateDayStamp()
    {
        $days = 0;

        // calculate days from years
        $years = $this->years * self::DAYS_IN_YEAR + $this->getLeapDays();
        $days += $years;

        // calculate days from months
        for ($i = $this->months; $i >= 1; $i--) {
            $days += CalendarConst::DAYS_IN_MONTH[$i];
        }

        // add days
        $days += $this->days;

        return $days;
    }

    /**
     * Calculates and returns number of leap days from difference between dates
     *
     * @return int $leapDays
     */
    private function getLeapDays()
    {
        $leapDays = round($this->years / 4);
        $leapDays -= $this->isLeap() ? 1 : 0;

        return $leapDays;
    }

    /**
     * Checks if given year is leap
     *
     * @param $year
     * @return bool
     */
    private function isYearLeap($year)
    {
        return ((($year % 4) == 0) && ((($year % 100) != 0) || (($year % 400) == 0)));
    }

    /**
     * @return int $this->dayStamp
     */
    public function getDayStamp()
    {
        return $this->dayStamp;
    }

    /**
     * @return int $this->years
     */
    public function getYears()
    {
        return $this->years;
    }

    /**
     * @return int $this->months
     */
    public function getMonths()
    {
        return $this->months;
    }

    /**
     * @return int $this->days
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @return int $this->leap
     */
    public function isLeap()
    {
        return $this->leap;
    }
}
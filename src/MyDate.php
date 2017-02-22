<?php
namespace AB\MyDate;


use AB\MyDate\Type\DayStampType;

class MyDate
{
    /**
     * Returns difference between given two dates;
     *
     * @param $startDate
     * @param $endDate
     * @return object StdClass
     */
    public static function diff($startDate, $endDate)
    {
        $parser = new MyDateParser();
        $startDate = $parser->parseDate($startDate);
        $endDate = $parser->parseDate($endDate);

        $startDayStamp = new DayStampType($startDate);
        $endDayStamp = new DayStampType($endDate);

        $inverted = true;
        if($startDayStamp->getDayStamp() > $endDayStamp->getDayStamp()){
            $temp_var = $endDate;
            $endDate = $startDate;
            $startDate = $temp_var;
            $inverted = false;
        }

        $totalDays = $startDayStamp->getDayStamp() - $endDayStamp->getDayStamp();

        if($totalDays < 0 ){
            $totalDays *= -1;
        }

        $myDateDiff = new MyDateDiff($startDate, $endDate);

        return (object)array(
            'years' => $myDateDiff->getYearDiff(),
            'months' => $myDateDiff->getMonthDiff(),
            'days' => $myDateDiff->getDayDiff(),
            'total_days' => $totalDays,
            'invert' => $inverted
        );
    }
}
<?php


namespace AB\MyDate;

Class CalendarConst
{
    const JAN_MONTH = 1;
    const FEB_MONTH = 2;
    const MAR_MONTH = 3;
    const APR_MONTH = 4;
    const MAY_MONTH = 5;
    const JUN_MONTH = 6;
    const JUL_MONTH = 7;
    const AUG_MONTH = 8;
    const SEP_MONTH = 9;
    const OCT_MONTH = 10;
    const NOV_MONTH = 11;
    const DEC_MONTH = 12;

    const DAYS_IN_MONTH = [
        self::JAN_MONTH => 31,
        self::FEB_MONTH => 28,
        self::MAR_MONTH => 31,
        self::APR_MONTH => 30,
        self::MAY_MONTH => 31,
        self::JUN_MONTH => 30,
        self::JUL_MONTH => 31,
        self::AUG_MONTH => 31,
        self::SEP_MONTH => 30,
        self::OCT_MONTH => 31,
        self::NOV_MONTH => 30,
        self::DEC_MONTH => 31,
    ];
}
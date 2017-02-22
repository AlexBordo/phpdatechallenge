<?php

namespace AB\MyDateTest;

use AB\MyDate\Type\DayStampType;
use PHPUnit\Framework\TestCase;

class DayStampTypeTest extends TestCase
{

    /**
     * @var DayStampType
     */
    private $dayStampType;

    public function setUp()
    {
        $this->dayStampType = new DayStampType($this->getFixtureData());
    }

    public function testGetYear()
    {
        $this->assertEquals($this->dayStampType->getYears(), 47);
    }

    public function testGetMonth()
    {
        $this->assertEquals($this->dayStampType->getMonths(), 5);
    }

    public function testGetDay()
    {
        $this->assertEquals($this->dayStampType->getDays(), 14);
    }

    public function testCalculateDayStamp()
    {
        $this->assertEquals($this->dayStampType->getDayStamp(), 17332);
    }

    private function getFixtureData()
    {
        return [
            'year' => '2017',
            'month' => '6',
            'day' => '15'
        ];
    }
}

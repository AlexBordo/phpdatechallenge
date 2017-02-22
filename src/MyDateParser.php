<?php
namespace AB\MyDate;

class MyDateParser
{
    const SEPARATOR = '/';

    const REGEX_YEAR = '[0-9]{4}';
    const REGEX_MONTH = '[0-1]{1}[0-9]{1}';
    const REGEX_DAY = '[0-3]{1}[0-9]{1}';

    /**
     * Parsing given sting date into array using regex for validation
     *
     * @param $date
     * @param array $dates
     * @return array
     */
    public function parseDate($date, $dates = [])
    {
        $pattern = self::REGEX_YEAR . self::SEPARATOR . self::REGEX_MONTH . self::SEPARATOR . self::REGEX_DAY;

        if (!preg_match("~^{$pattern}$~", $date)) {
            throw new \InvalidArgumentException('Date format is not valid');
        }

        list($dates['year'], $dates['month'], $dates['day']) = explode(self::SEPARATOR, $date);

        return $dates;
    }
}

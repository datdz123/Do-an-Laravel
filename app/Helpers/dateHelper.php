<?php

namespace App\Helpers;

use Carbon\Carbon;

class dateHelper
{
    public static function getListDayInMonth()
    {
        $arrayDay = [];
        $d = date('d');
        $month = date('m');
        $year = date('Y');

        for ($day = 1; $day <= $d; $day++) {
            $time = mktime(12, 0, 0, $month, $day, $year);
            if (date('m', $time) == $month)
                $arrayDay[] = date('Y-m-d', $time);
        }
        return $arrayDay;
    }
    public static function generateDateRange(Carbon $start_date, Carbon $end_date)
    {
        $dates = [];

        for ($date = $start_date->copy(); $date->lte($end_date); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        return $dates;
    }
}

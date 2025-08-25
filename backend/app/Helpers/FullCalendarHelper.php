<?php

namespace App\Helpers;

trait FullCalendarHelper
{
    public function setYeasToSelect()
    {
        $currentYear = now()->year;
        $yearsToSelect = [];
        for($y = 0; $y < 5; $y++){
            $year = $currentYear + $y;
            $yearsToSelect[$year] = $year;
        }
        return $yearsToSelect;
    }

    public function setMonthsToSelect()
    {
        $months = __('common.months');
        $monthsToSelect = [];
        foreach($months as $key => $month) {
            $index = $key + 1;
            if($index < 10){
                $index = '0'.$index;
            }
            $monthsToSelect[$index] = $month;
        }
        return $monthsToSelect;
    }
}
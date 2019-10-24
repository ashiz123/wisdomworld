<?php

namespace App\Http\ViewComposers;
use App\Helpers\DateHelper;
use Auth;


use Illuminate\View\View;

Class ProfileComposer
{
    public function compose(View $view)
    {
        $joined_date = Auth::user()->created_at;
        $date = $joined_date->format('m/Y');
        $month_in_number = substr($date, 0, 2);
        $month_name = DateHelper::monthName($month_in_number);

        $view->with('month_name', $month_name);

    }
}


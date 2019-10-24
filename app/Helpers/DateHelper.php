<?php

namespace App\Helpers;



Class DateHelper 
{

    public static function monthName($month_in_number)
    {
    
        // dd($month_in_number);
        switch($month_in_number)
        {
            case "01" :
            $month_name = "January";
            break;

            case "02" :
            $month_name= "February";
            break;

            case "03" :
            $month_name = "March";
            break;

            case "04" :
            $month_name = "April";
            break;

            case "05" :
            $month_name = "May";
            break;

            case "06" :
            $month_name = "June";
            break;

            case "07" :
            $month_name = "July";
            break;

            case "08":
            $month_name = "August";
            break;

            case "09" :
            $month_name = "September";
            break;

            case "10" :
            $month_name = "October";
            break;

            case "11" :
            $month_name = "November";
            break;

            case "12":
            $month_name = "December";
            break;

        }
        return $month_name;   
    }

}
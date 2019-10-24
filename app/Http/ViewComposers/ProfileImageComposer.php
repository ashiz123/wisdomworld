<?php

namespace App\Http\ViewComposers;
use App\Helpers\DateHelper;
use App\User\Userinfo;
use Auth;


use Illuminate\View\View;

Class ProfileImageComposer
{
    public function compose(View $view)
    {
       
        if(Auth::check() && Auth::user()->userInfo()->first() != null)
        {
            $userInfo = Auth::user()->userInfo()->first();
             $view->with('userInfo', $userInfo);
        }
      
       
    }
}


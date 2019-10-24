<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Filter;

class FilterController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

     public function index(Request $request)
    {
        
        // $posts = Filter::homepage($request);
        return response()->json([
            'status' => 'success',
             'redirectUrl' => route('filter.apply', ['filterBy' => $request->filter])
        ]);
        
       
    }

    public function apply($request)
    {
        $posts = Filter::homepage($request);
        return view('User.pages.filter.homepage',[
            'posts' => $posts
        ]);
            
    }

   
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\EducationInfoRequest;
use App\Http\Controllers\Controller;
use App\Repositories\EducationInterface;
use Auth;
use App\Repositories\Eloquent\EducationInfoRepository;

class EducationInfoController extends Controller
{

    private $repo;
    
 

    public function __construct(EducationInterface $repo)
    {
        $this->repo = $repo;
    }

    public function create()
    {
        return view('User.pages.profile.education_info');
    }


    public function store(EducationInfoRequest $request)
    {
        
        $this->repo->store($request);
        // return redirect()->route('profile',['name' => Auth::user()->name] );
        return response()->json([
            'status' => 'success',
            'message' => 'Education info created',
            // 'redirectUrl' => route('profile',['name' => Auth::user()->name])
            'redirectUrl' => route('tag.index', ['name' => Auth::user()->name])
        ]);
    }
}

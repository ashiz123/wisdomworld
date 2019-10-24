<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\BasicInfoRequest;
use App\Repositories\Eloquent\UserinfoRepository;
use App\Repositories\RepositoryInterface;
use Auth;

class BasicInfoController extends Controller
{

    private $repo;
    
 

    public function __construct(RepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function create()
    {
        return view('User.pages.profile.basic_info');
    }

     public function store(BasicInfoRequest $request)
    {
      $this->repo->store($request);
      return response()->json([
        'status' => 'success',
        'message' => 'Basic info created',
        'redirectUrl' => route('education_info.create', ['name' => Auth::user()->name])
      ]);
    //   return redirect()->route('education_info.create', ['name' => Auth::user()->name]);
      
    }
}

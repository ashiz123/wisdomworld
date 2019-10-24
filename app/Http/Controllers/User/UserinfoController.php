<?php

namespace App\Http\Controllers\User;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Repositories\eloquent\UserinfoRepository;
use App\Repositories\RepositoryInterface;
use App\User\Userinfo;
use App\Http\Requests\User\UserinfoRequest;
use Auth;

class UserinfoController extends Controller
{

    private $repo;
    
 

    public function __construct(RepositoryInterface $repo)
    {
        $this->repo = $repo;
    }


    public function all()
    {
        return $this->repo->all();
    }

    public function create()
    {
       //Create the info
       return view('User.pages.Userinfo.add');
    }

    public function store(UserinfoRequest $request)
    {
      
        if(Userinfo::where('user_id', Auth::user()->id)->exists())
        {
            return view('User.pages.Userinfo.index');
        }

      $this->repo->store($request);
      
    }


  
    
        
}

<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Repositories\ProfileInterface;


class ProfileController extends Controller
{

    // HomeController changed to ProfileController which is Controllers folder
    /**
     * Create a new controller instance.
     *
     * @return void
     */

        /**
     * Follow the user.
     *
     * @param $profileId
     *
     */

    public function __construct(ProfileInterface $repo)
    {
        $this->middleware('auth');
        $this->repo = $repo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($profileId = null)
    {
       
       return $this->repo->index($profileId);
     
    }

    

    public function followUser(int $profileId)
    {
        return $this->repo->followUser($profileId);
     }

    
      public function unFollowUser($profileId)
    {
        return $this->repo->unFollowUser($profileId);
    }

    











    public function register()
    {
        return view('User.pages.profile.basic_info');
    }

    public function timeline()
    {
        return view('User.profile.pages.timeline');
    }

    public function about()
    {
        return view('User.profile.pages.about'); 
    }
}

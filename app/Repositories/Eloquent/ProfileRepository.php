<?php

namespace App\Repositories\Eloquent;

use App\Http\Traits\FileUploadTraits;
use App\Post;
use App\Repositories\ProfileInterface;
use Auth;

use App\Education;
use App\User\Userinfo;
use App\User;
use App\Followers;
use App\Helpers\Following;

class ProfileRepository implements ProfileInterface
{
    public function index($profileId = null)
    {
        
        if(Following::follow($profileId) == true)
        {
            $follow = Followers::show_follow;
        }
        else{
            $follow = Followers::show_unfollow;
        }
        
        if($profileId != Auth::user()->name && $profileId != Auth::user()->id )
        {
            $user = User::find($profileId);
            $basicInfo = $user->userInfo()->first();
            $latestPost = Post::where('user_id',$profileId)->latest()->paginate(8);
            $showFollowButton = Followers::hide_follow_button;
           
        }
        else{
            $user = Auth::user();
            $basicInfo = Auth::user()->userInfo()->first();
            $latestPost = Post::where('user_id', Auth::user()->id)->latest()->paginate(8);
            $showFollowButton = Followers::show_follow_button;
            
        }
           
        return view('User.pages.profile.index', [
            'user' => $user,
            'basicInfo' => $basicInfo,
            'latestPost' => $latestPost,
            'follow' => $follow,
            'showFollowButton' => $showFollowButton
        ]);
     
    

    }
  
    public function followUser(int $profileId)
    {
        $user = User::find($profileId);
        if(! $user) {
          
           return redirect()->back()->with('error', 'User does not exist.'); 
       }
       
        
       if(Following::follow($profileId) == true)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Followed previously',
                'redirectUrl' => url()->previous()
            ]);
        }
        else
        {
            
            $user->followers()->attach(auth()->user()->id);
            return response()->json([
             'status' => 'success',
             'message' => 'Followed successfully',
             'redirectUrl' => url()->previous()
         ]);
        }

    }
    
  
    
    public function unFollowUser($profileId)
    {
            $user = User::find($profileId);
            $user->followers()->detach(auth()->user()->id);
            return response()->json([
            'status' => 'success',
            'message' => 'User is unfollowed',
            'redirectUrl' => url()->previous()
        ]);

    }

    
    
}

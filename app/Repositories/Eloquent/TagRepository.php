<?php

namespace App\Repositories\Eloquent;
use App\TagUser;
use Auth;


use App\Repositories\TagInterface;

class TagRepository implements TagInterface
{
  
    public function store($id)
    {
        return Auth::user()->tag()->attach($id);
        
    }

    public function remove($id)
    {
        $tagUser =TagUser::find($id);
        $tagUser->delete();

        return $tagUser;
    }
  
    

    
    
}

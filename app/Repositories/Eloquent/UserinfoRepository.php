<?php

namespace App\Repositories\Eloquent;

use App\User\Userinfo;
use App\Repositories\EducationInterface;
use App\Repositories\RepositoryInterface;
use Auth;
use App\Http\Traits\FileUploadTraits;

Class UserinfoRepository implements RepositoryInterface
{
    protected $userinfo;
    use FileUploadTraits;

    public $path = "profile/";

    public function __construct(Userinfo $userinfo)
    {
        $this->userinfo = $userinfo;
    }

    public function all()
    {
        return $this->userinfo->all();
    }

     public function store($attributes) 
  {
    

      $userInfo = new Userinfo;
      $userInfo->user_id = Auth::user()->id;
      $userInfo->date_of_birth = $attributes['date_of_birth'];
      $userInfo->contact = $attributes['contact'];
      $userInfo->image = $this->uploadImage( $attributes['image'], $this->path);
      $userInfo->country = $attributes['country'];
      $userInfo->state = $attributes['state'];
      $userInfo->address = $attributes['address'];
      $userInfo->postal_code = $attributes['postal_code'];
      $userInfo->save();

      
     
    
  }



}
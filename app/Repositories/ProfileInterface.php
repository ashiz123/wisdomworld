<?php

namespace App\Repositories;


Interface ProfileInterface
{
    public function index($profileId = null);
  
    public function followUser(int $profileId);
    
    public function unFollowUser($profileId);
   
}
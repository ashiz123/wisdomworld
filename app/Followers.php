<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Followers extends Model
{
    const TABLE = "followers";

    protected $table = self::TABLE;

   const show_follow = 1;
   const show_unfollow = 0;

   const show_follow_button =1;
   const  hide_follow_button =0;


}


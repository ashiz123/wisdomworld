<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Userinfo extends Model
{
    const TABLE = "userinfos";

    protected $table = self::TABLE;

    protected $fillable = [
        'contact',' date_of_birth', 'country', 'state', 'address', 'postal_code', 'image'
    ];



    public function userRelation():BelongsTo

    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function user()
    {
        return $this->userRelation();
    }
}

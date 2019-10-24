<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    const TABLE = "education";

    protected $table = self::TABLE;

    protected $fillable = [
        'skills',' completion_on', 'main_subject', 'highest_level'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

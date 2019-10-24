<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    const TABLE = "addresses";

    protected $table = self::TABLE;
}

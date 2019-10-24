<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagUser extends Model
{
    const TABLE = "tag_user";

    protected $table = self::TABLE;

    public function tag()
    {
        $tagName = Tag::where('id', $this->tag_id)->first()->tag;
        return $tagName;
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostTags extends Model
{
    const TABLE = "post_tag";

    protected $table = self::TABLE;


    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

  
}

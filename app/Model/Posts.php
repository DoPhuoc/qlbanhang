<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    public function tags()
    {
        return $this->belongsTo('App\Model\Tag','post_tag_id', 'id');
    }

    public function postCategory()
    {
        return $this->belongsTo('App\Model\PostCategory','post_cat_id', 'id');
    }
}

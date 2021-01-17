<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable=['title','slug','summary','description','quote','image','status','post_cat_id','post_tag_id'];
    public function tags()
    {
        return $this->belongsTo('App\Model\Tag','post_tag_id', 'title');
    }
    public function postCategory()
    {
        return $this->belongsTo('App\Model\PostCategory','post_cat_id', 'title');
    }
}

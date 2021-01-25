<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Base
{
    protected $table = 'posts';
    protected $fillable = ['title', 'slug', 'description', 'quote', 'image', 'status', 'post_category_id'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function getTagLabelsAttribute()
    {
        return implode($this->tags->map(function ($tag) {
            $route = route('admin.tag.edit', $tag->id);
            return "<a class='btn btn-sm btn-outline-info m-2' href='$route'>$tag->title</a>";
        })->toArray());
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Post;
class PostCategory extends Model
{
    protected $table = 'post_categories';
    protected $fillable = ['title','slug','description','status','created_at','updated_at'];
    public function blogs()
    {
        return $this->hasMany(Post::class)
            ->where('status', Post::ACTIVE); 
    }

}

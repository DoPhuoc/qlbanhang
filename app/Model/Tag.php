<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Post;
class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = ['title','slug','description','status','created_at','updated_at'];
    public function blogs()
    {
        return $this->hasMany(Post::class)
            ->where('status', Post::ACTIVE); 
    }
}

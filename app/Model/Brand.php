<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Base
{
    protected $table = 'brands';
    public $fillable = [
        'name',
        'slug',
        'description',
        'status'
    ];
    public function products()
    {
        return $this->hasMany(Product::class)
            ->where('status', Product::ACTIVE);
    }
}

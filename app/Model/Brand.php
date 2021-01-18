<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Base
{
    protected $table = 'brands';

    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

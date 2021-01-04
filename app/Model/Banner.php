<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable=['title','slug','description','photo','status'];
    protected $table = 'banners';
    public function insertDataBanner($dataBanner)
    {
        return Banner::create($dataBanner);
    }
}

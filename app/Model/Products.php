<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    
    protected $table = 'products';
    public $fillable = ['product_id','categories_id','brands_id','name_product','slug_product','description','image','hot_product','size','quantity','price','status','sale_off','code_product','created_at','updated_at'];
    public function brands()
    {
        return $this->belongsTo('App\Model\Brands','brands_id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo('App\Model\Categories','categories_id', 'id');
    }
 
}

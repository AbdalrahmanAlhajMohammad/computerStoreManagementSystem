<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsSpecifications extends Model
{
    protected $table='products_specifications';
    protected $fillable=['title','content','product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}

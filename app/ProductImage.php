<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    protected $table='products_images';
    protected $fillable=['image','title','product_id'];

    public function getImagePathAttribute()
    {
        //return asset("storage/products/{$this->product_id}/{$this->image}");
        return $this->image;
    }
    public function getImageAttribute($value)
    {
        return asset("storage/products/{$this->product_id}/{$value}");
    }



}

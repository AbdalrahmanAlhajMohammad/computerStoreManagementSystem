<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $fillable=['id','name','description','logo','category_id',
        'price','manufactor_id','active'];

    public function getLogoPathAttribute()
    {
       // return asset("storage/products/{$this->logo}");
        return $this->logo;
    }


    public function getLogoAttribute($value)
    {
        return asset("storage/products/{$value}");
    }




    public function category()
    {
        return $this->belongsTo(Category::class,'category_id',
            'id');
    }

    public function manufactory()
    {
        return $this->belongsTo(Manufactory::class,'manufactor_id','id');
    }

    public function highlights()
    {
        return $this->hasMany(ProductHighlight::class,'product_id','id');
    }

    public function specifications()
    {
        return $this->hasMany(ProductsSpecifications::class,'product_id','id');

    }

    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function ratings()
    {
        return $this->hasMany(ProductRating::class);
    }








}

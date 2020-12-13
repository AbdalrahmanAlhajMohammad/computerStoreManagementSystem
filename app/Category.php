<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    protected $table='categories';
    protected $fillable=['id','name','order','logo'];

    public function Products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }

    public function getLogoPathAttribute()
    {
        return $this->logo;
    }

    public function getLogoAttribute($value)
    {
        return asset("storage/categories/{$value}");
    }

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function childes()
    {
        return $this->hasMany(Category::class,'parent_id','id');

    }

}

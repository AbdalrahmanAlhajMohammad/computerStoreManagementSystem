<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufactory extends Model
{
    protected $table='manufactories';
    protected $fillable=['name','logo'];

    public function getLogoPathAttribute()
    {
        return asset("storage/manufactories/{$this->logo}");
    }

    public function products()
    {
        return $this->hasMany(Product::class,'manufactor_id','id');
    }
}

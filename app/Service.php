<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table='services';
    protected $fillable=['id','name','description','logo','active'];

    public function servicesOrders()
    {
        return $this->hasMany(ServiceOrder::class,'service_id','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderState extends Model
{
    protected $table='orders_status';

    public function serviceOrder()
    {
        return $this->hasMany(ServiceOrder::class,'state_id','id');
    }
}

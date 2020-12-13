<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    protected $table='services_orders';
    protected $fillable=['title','description','service_id','customer_id','state_id'];

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function state()
    {
        return $this->belongsTo(OrdersCart::class,'service_id','id');
    }

    public function attachments()
    {
        return $this->hasMany(ServiceOrderAttachment::class,'service_order_id','id');
    }
}

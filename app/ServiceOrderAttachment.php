<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceOrderAttachment extends Model
{
    protected $table='services_orders_attachments';
    protected $fillable=['attachment','service_order_id'];

    public function serviceOrder()
    {
        return $this->belongsTo(ServiceOrder::class,'service_order_id','id');
    }
}

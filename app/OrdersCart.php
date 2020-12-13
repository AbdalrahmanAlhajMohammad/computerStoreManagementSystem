<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersCart extends Model
{
    protected $table='orders_cart';
    protected $fillable=['product_id','cost','order_id'];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');

    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}

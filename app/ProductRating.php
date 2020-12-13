<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    protected $table='products_ratings';
    protected $fillable=['rate','comment','product_id','customer_id'];

}

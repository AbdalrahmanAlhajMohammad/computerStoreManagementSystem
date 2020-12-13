<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductHighlight extends Model
{
    protected $table='products_highlights';
    protected $fillable=['context','product_id'];

    public function product()
    {
        $this->belongsTo(Product::class);
    }
}

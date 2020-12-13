<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SliderItem extends Model
{
    protected $table='slider_items';
    protected $fillable=['title','ar_title','image','category_or_product','category_or_product_id','order','visible'];

    public function getImageAttribute($value)
    {
        return asset("storage/slider/{$value}");
    }

    public function setImageAttribute($file)
    {
        $this->attributes['image']=basename(Storage::putFile("public/slider",$file));
    }

    public function setVisibleAttribute($value)
    {
        if($value=='on')
            $this->attributes['visible']=true;
        elseif ($value=='off')
            $this->attributes['visible']=false;

    }

    public function url()
    {
        $id=$this->category_or_product_id;
        if ($this->category_or_product=='c')
        {
            $category=Category::where('id',$id)->first();
            return route('customer.categories.show',['id'=>$id]);
        }
        elseif ($this->category_or_product=='p')
        {
             $product=Product::where('id',$id)->first();
             return route('customer.products.show',['id'=>$id]);
        }
    }




}

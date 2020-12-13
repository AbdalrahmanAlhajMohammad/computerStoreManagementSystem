<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Link extends Model
{
    protected $fillable=['title','url','icon','route','parent_id','new_window','show_in_menu',
        'order_id'];
    protected $table='links';


   /* public function childs()
    {
       return $this->hasMany($this,'parent_id','id');
    }

    public function parent()
    {
        return $this->belongsTo($this,'parent_id','id');
    }*/

   public function users()
   {
       return $this->belongsToMany(User::class,'users_links','link_id','user_id');
   }

   public function getTitleAttribute($value)
   {
       if (App::isLocale('ar'))
       {
           return $this->ar_title;
       }
       else
       {
           return $value;
       }
   }
}

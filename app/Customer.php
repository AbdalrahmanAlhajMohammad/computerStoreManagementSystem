<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $guarded='customer';
    protected $table='customers';
    protected $fillable=['first_name','last_name','email','gender','password',
        'logo','mobile','active'];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getGenderAttribute($value)
    {
        if (strtolower($value)=='m')
            return 'male';
        elseif (strtolower($value)=='f')
            return 'female';
    }

    public function getActiveAttribute($value)
    {
        if ($value==1)
            return 'active';
        elseif ($value==0)
            return 'not active';
    }

    public function servicesOrders()
    {
        return $this->hasMany(ServiceOrder::class,'customer_id','id');
    }
}

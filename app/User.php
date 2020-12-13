<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded='admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile','gender','active',
        'date_of_birth','last_login_date','last_logout_date','logo','lang'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates=[
        'date_of_birth'=>'d-m-Y'
    ];


    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getActiveStateAttribute()
    {
        return $this->active?__('admin/account.active'):__('admin/account.not_active');
    }

    public function getGenderASTextAttribute()
    {
        if ($this->gender='m')
            return __('statuses.male');
        elseif ($this->gender='f')
            return __('statuses.female');
        else
            return __('statuses.unknown');

    }

    public function getLogoAttribute($value)
    {
        if ($value)
        return asset("storage/users/{$value}");
        else return 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image';
    }

    public function setLogoAttribute($file)
    {
        $this->attributes['logo']=basename(Storage::putFile("public/users",$file));
    }

    public function getAge()
    {
        if ($this->date_of_birth)
            return date_diff(date('Y-m-d'),date('Y-m-d',$this->date_of_birth));
        else return null;
    }


    public function links()
    {
        return $this->belongsToMany(Link::class,'users_links','user_id','link_id');
    }






}

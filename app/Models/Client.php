<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    public $timestamps = true;
    protected $table = 'clients';
    protected $fillable = array('name', 'email', 'phone', 'password', 'd_o_b', 'blood_type_id', 'last_donation_date', 'city_id', 'pin_code');
    protected $casts = ['created_at' => 'datetime:Y-m-d H:m:s', 'updated_at' => 'datetime:Y-m-d H:m:s'];
    protected $hidden = [
        'password', 'api_token',
    ];

    public function bloodTypes()
    {
        return $this->belongsToMany('App\Models\BloodType','blood_type_client','client_id','blood_type_id');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType','blood_type_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function donations()
    {
        return $this->hasMany('App\Models\Donation');
    }

    public function posts() // favourites
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate','client_governorate','client_id','governorate_id');
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

}

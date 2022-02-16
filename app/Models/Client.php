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

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function cityName()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function donationRquest()
    {
        return $this->hasMany('App\Models\Donation');
    }

    public function post()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function notification()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function governorateName()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function contact()
    {
        return $this->hasMany('App\Models\Contact');
    }

}

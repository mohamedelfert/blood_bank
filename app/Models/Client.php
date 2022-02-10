<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'password', 'd_o_b', 'blood_type_id', 'last_donation_date', 'city_id', 'pin_code');

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
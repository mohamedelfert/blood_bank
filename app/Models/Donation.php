<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{

    protected $table = 'donations';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'patient_age', 'blood_type_id', 'city_id', 'client_id', 'bags_num', 'hopital_name', 'hopital_address', 'latitude', 'longitude', 'details');
    protected $casts = ['created_at' => 'datetime:Y-m-d H:m:s','updated_at' => 'datetime:Y-m-d H:m:s'];

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function clientName()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function cityName()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function notification()
    {
        return $this->hasMany('App\Models\Notification');
    }

}

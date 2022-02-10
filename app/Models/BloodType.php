<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function donationRquest()
    {
        return $this->hasMany('App\Models\Donation');
    }

    public function clientName()
    {
        return $this->hasMany('App\Models\Client');
    }

}
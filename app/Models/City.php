<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'governorate_id');

    public function governorateName()
    {
        return $this->belongsTo('Governorate');
    }

    public function clientName()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function donationRquest()
    {
        return $this->hasMany('App\Models\Donation');
    }

}
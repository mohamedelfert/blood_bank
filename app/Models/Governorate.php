<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model 
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('name');

    public function cityName()
    {
        return $this->hasMany('City');
    }

    public function clientName()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}
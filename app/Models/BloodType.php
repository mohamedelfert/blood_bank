<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');
    protected $casts = ['created_at' => 'datetime:Y-m-d H:m:s','updated_at' => 'datetime:Y-m-d H:m:s'];

    public function donations()
    {
        return $this->hasMany('App\Models\Donation');
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

}

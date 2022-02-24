<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $guarded = [];
//    protected $fillable = array('name', 'governorate_id');
    protected $casts = ['created_at' => 'datetime:Y-m-d H:m:s','updated_at' => 'datetime:Y-m-d H:m:s'];

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function donations()
    {
        return $this->hasMany('App\Models\Donation');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('name');
    protected $casts = ['created_at' => 'datetime:Y-m-d H:m:s','updated_at' => 'datetime:Y-m-d H:m:s'];

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}

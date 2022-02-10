<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model 
{

    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = array('client_id', 'subject', 'message');

    public function clientName()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
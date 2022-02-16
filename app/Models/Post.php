<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'image', 'category_id');
    protected $casts = ['created_at' => 'datetime:Y-m-d H:m:s','updated_at' => 'datetime:Y-m-d H:m:s'];

    public function categoryName()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function clientName()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}
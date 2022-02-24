<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public $timestamps = true;
    protected $table = 'posts';
    protected $guarded = [];
//    protected $fillable = array('title', 'content', 'image', 'category_id', 'client_id', 'publish_date');
    protected $casts = ['created_at' => 'datetime:Y-m-d H:m:s', 'updated_at' => 'datetime:Y-m-d H:m:s'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function clients() // favourites
    {
        return $this->belongsToMany('App\Models\Client');
    }

}

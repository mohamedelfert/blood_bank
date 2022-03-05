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
    protected $appends = array('is_favourite'); // getIsFavouriteAttribute()

    public function getIsFavouriteAttribute()
    {
        $client = auth()->guard('client')->user() ?? auth()->guard('api')->user();
        if (!$client)
        {
            return false;
        }
        $favourite = $this->whereHas('clients',function ($query) use($client){
            $query->where('client_post.client_id',$client->id);
            $query->where('client_post.post_id',$this->id);
        })->first();
        // client
        // null
        if ($favourite)
        {
            return true;
        }
        return false;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function clients() // favourites
    {
        return $this->belongsToMany('App\Models\Client');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['category_id', 'users_id', 'editors_id', 'title', 'slug', 'image', 'description', 'body', 'type', 'is_published', 'status', 'reason'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // public function users()
    // {
    //     return $this->belongsTo('App\User');
    // }

    // public function editor()
    // {
    //     return $this->belongsTo('App\Editor');
    // }

    public function consumers()
    {
        return $this->belongsTo('App\Consumer', 'users_id');
    }

    public function editor()
    {
        return $this->belongsTo('App\Consumer', 'editors_id');
    }
}

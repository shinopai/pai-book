<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'author', 'published_at', 'description', 'image_path', 'category_id'
    ];

    //     /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'published_at' => 'date'
    // ];

    /**
     * relation
     */
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}

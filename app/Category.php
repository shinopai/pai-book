<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * relation
     */
    public function books(){
        return $this->hasMany('App\Book');
    }
}

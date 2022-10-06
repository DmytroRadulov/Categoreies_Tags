<?php

namespace web\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = true;

    public function posts(){
        return $this->hasMany(Post::class);
    }

}
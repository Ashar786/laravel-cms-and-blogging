<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    pulic function  Posts() {

        return $this->hasMany('App\Post') ;

    }
}

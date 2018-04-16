<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 */
class Category extends Model
{
    public static function find($id)
    {
    }

    public function  Posts() {

        return $this->hasMany('App\Post') ;

    }
}

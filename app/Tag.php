<?php

namespace App;
use App\Post ;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag'
    ];

    public function posts() {
        return$this->belongsToMany('App\Post') ;
    }
}

<?php

namespace App;
use App\User ;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'avatar','user_id','about','facebook','youtube'
    ];
    public function user() {
        return $this->belongsTo('App\User') ;
    }
}

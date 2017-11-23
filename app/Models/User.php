<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'nickname', 'union_id', 'avatar', 'email', 'is_use'];

    public function passages()
    {
        return $this->hasMany('App\Models\Passage');
    }


    public function Labels()
    {
        return $this->hasMany('App\Models\Label');
    }

    public function favors()
    {
        return $this->hasMany('App\Models\Favor');
    }


}

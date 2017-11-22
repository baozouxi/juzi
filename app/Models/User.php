<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected  $fillable = ['name', 'nickname', 'union_id', 'avatar', 'email','is_use'];




}

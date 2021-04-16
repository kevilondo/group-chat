<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    //attributes that are not mass assignable
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'admin_id');
    }

    public function participants()
    {
        return $this->belongsToMany('App\Models\User', 'group_participants', 'group_id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message', 'group_id');
    }
}

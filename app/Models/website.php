<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\post;
use App\Models\User;


class website extends Model
{
    use HasFactory;

    protected $fillable = ['title','url' , 'user_id'];

    public function post()
    {
        return $this->hasMany(post::class);
    }

    public function subscribes()
    {
        return $this->belongsToMany(user::class , 'subscribes' , 'website_id' , 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function subscribe()
    {
        return $this->hasMany(subscribe::class);
    }
}

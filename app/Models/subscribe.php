<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscribe extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','website_id' , 'id'];

    public function website(){
        return $this->belongsTo(website::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}

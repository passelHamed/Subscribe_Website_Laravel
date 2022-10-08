<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\website;

class post extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','website_id'];

    public function website(){
        return $this->belongsTo(website::class);
    }
}

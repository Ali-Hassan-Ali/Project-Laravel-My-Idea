<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['image_path'];

    public function user()
    {
        return $this->belongsTo(User::class);

    }//end of fun

    public function like()
    {
        return $this->hasMany(Like::class);

    }//end of fun


    public function comments()
    {
        return $this->hasMany(Comment::class);

    }//end of fun

    public function getImagePathAttribute()
    {
        return asset('storage/'. $this->image);

    }//end of get

}//end of Model

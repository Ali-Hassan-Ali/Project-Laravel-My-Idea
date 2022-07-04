<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);

    }//end of fun

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

    public function groups()
    {
        return $this->hasMany(Group::class);

    }//end of fun


}//end of model

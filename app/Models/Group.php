<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function group_ideas()
    {
        return $this->hasMany(GroupIdea::class);

    }//end of fun

    public function chats()
    {
        return $this->hasMany(Chat::class);

    }//end of fun
    
}//end if model

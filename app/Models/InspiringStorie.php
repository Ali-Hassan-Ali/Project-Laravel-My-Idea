<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspiringStorie extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);

    }//end of fun

    public function like()
    {
        return $this->hasMany(Like::class);

    }//end of fun
    
}//end if mode

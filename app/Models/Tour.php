<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tour extends Model
{
    use HasFactory;
    public function package(){
        return $this->belongsTo('App\Models\Package');
    }
    public function bookings(){
        return $this->hasMany('App\Models\Booking');
    }
}

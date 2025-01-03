<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    public function destination_photos(){
        return $this->hasMany('App\Models\DestinationPhoto');
    }
    public function destination_videos(){
        return $this->hasMany('App\Models\DestinationVideo');
    }
}

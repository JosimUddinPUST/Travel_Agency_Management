<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function destination(){
        return $this->belongsTo('App\Models\Destination');
    }
    public function package_faqs(){
        return $this->hasMany('App\Models\PackageFaq');
    }
}

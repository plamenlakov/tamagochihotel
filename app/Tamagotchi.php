<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamagotchi extends Model
{
    public function booking(){
        $this->hasOne(Booking::class);
    }
}

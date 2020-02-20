<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function bookings() {
        $this->hasMany(Booking::class);
    }

    public function tamagotchis() {
        $this->hasMany(Tamagotchi::class);
    }
}

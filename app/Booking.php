<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function tamagotchi() {
        $this->belongsTo(Tamagotchi::class);
    }

    public function room() {
        $this->belongsTo(Room::class);
    }
}

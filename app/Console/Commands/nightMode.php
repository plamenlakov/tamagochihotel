<?php

namespace App\Console\Commands;

use App\Booking;
use App\Room;
use App\Tamagotchi;
use Illuminate\Console\Command;

class nightMode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'toggle:nightMode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Toggles night mode and its effects for all tamagotchis.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Get all tamagotchis
        $tamagotchis = Tamagotchi::all();
        //Process each one
        foreach($tamagotchis as $t) {
            if($t->alive){
                //Get number of bookings for particular Tamagotchi
                $bookings = count(Booking::where('tamagotchi_id', $t->id)->get('room_id'));
                //Increment level
                $t->level++;

                //Universal for all Tamagotchis
                if($t->boredom >= 70) {
                    if($t->health <= 20){
                        $t->health = 0;
                        $t->alive = false;
                    } else {
                        $t->health -= 20;
                    }
                }

                //Rules for Tamagotchis outside of hotel
                if($bookings <= 0){
                    if($t->health <= 20){
                        $t->health = 0;
                        $t->alive = false;
                    } else {
                        $t->health -= 20;
                        $t->boredom += 20;
                    }
                } else {
                    //Rules for Tamagotchis inside of hotel
                    $room_id = Booking::where('tamagotchi_id', $t->id)->get('room_id');
                    $room_type = Room::find($room_id)->first()->type;

                    if($room_type == "relax"){
                        $t->coins -= 10;
                        $t->health += 20;
                        $t->boredom += 10;
                    }
                    else if($room_type == "game"){
                        $t->coins -= 20;
                        $t->boredom = 0;
                    }
                    else if($room_type == "working"){
                        $t->coins += rand(10, 60);
                        $t->boredom += 20;
                    }
                }
            }
            //Save changes to iteration Tamagotchi
            $t->save();
        }
    }
}

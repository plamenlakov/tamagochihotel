<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return Booking::all();
    }

    public function show($id)
    {
        return Booking::find($id);
    }

    public function store()
    {
        $data = request()->validate([
            'room_id' => 'required',
            'tamagotchi_id' => 'required'
        ]);
        //Select room
        $selected_room  = Room::find($data['room_id']);
        $room_size = $selected_room->size;
        Booking::where('room_id', $selected_room->id);

        //Check if room is booked
        $booked_slots = count(Booking::where('room_id', $selected_room->id)->get('tamagotchi_id'));

        //Get ids of tamagotchis for booking
        $tamagotchi_ids = array_unique($data['tamagotchi_id']);
        //Get their number
        $number_of_tamagotchis = count($tamagotchi_ids);

        //If the num of tamagotchis fit in the room and it is not booked go ahead
        if($room_size >= $number_of_tamagotchis && $booked_slots == 0) {
            foreach ($tamagotchi_ids as $id) {
                //Create a booking for each of them
                $booking = new Booking;
                $booking->room_id = $selected_room->id;
                $booking->tamagotchi_id = $id;
                $booking->save();
            }
        }
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return $booking;
    }

    public function delete(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return 204;
    }
}

<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return Room::all();
    }

    public function show($id)
    {
        return Room::find($id);
    }

    public function store()
    {
        $data = request()->validate([
            'size' => 'required',
            'type' => 'required'
        ]);

        if($data['type'] == 'relax' || $data['type'] == 'game' || $data['type'] == 'working' || $data['type'] == 'fighting') {
            $room = new Room;
            $room->size = $data['size'];
            $room->type = $data['type'];
            $room->save();
        }
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($request->all());

        return $room;
    }

    public function delete(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return 204;
    }
}

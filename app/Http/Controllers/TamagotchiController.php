<?php

namespace App\Http\Controllers;

use App\Tamagotchi;
use Illuminate\Http\Request;

class TamagotchiController extends Controller
{
    public function index()
    {
        return Tamagotchi::all();
    }

    public function show($id)
    {
        return Tamagotchi::find($id);
    }

    public function store()
    {
        $data = request();

        $tamagotchi = new Tamagotchi;

        $tamagotchi->name = $data['name'];
        $tamagotchi->age = $data['age'];
        $tamagotchi->coins = $data['coins'];
        $tamagotchi->level = 1;
        $tamagotchi->health = 100;
        $tamagotchi->boredom = 30;
        $tamagotchi->alive = true;

        $tamagotchi->save();
    }

    public function update(Request $request, $id)
    {
        $tamagotchi = Tamagotchi::findOrFail($id);
        $tamagotchi->update($request->all());

        return $tamagotchi;
    }

    public function delete(Request $request, $id)
    {
        $tamagotchi = Tamagotchi::findOrFail($id);
        $tamagotchi->delete();

        return 204;
    }
}

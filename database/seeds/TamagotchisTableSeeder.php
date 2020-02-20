<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TamagotchisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tamagotchis = [
            ['name'=>'Josh', 'age'=> 23, 'coins'=> 333,'level'=> 30,'health'=> 100,'boredom'=> 20, 'alive'=>true, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name'=>'Owen', 'age'=> 13, 'coins'=> 532,'level'=> 21,'health'=> 30,'boredom'=> 80, 'alive'=>true, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name'=>'Lars', 'age'=> 42, 'coins'=> 3999,'level'=> 84,'health'=> 43,'boredom'=> 50, 'alive'=>true, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name'=>'Boring Tamagotchi', 'age'=> 89, 'coins'=> 42919,'level'=> 102,'health'=> 100,'boredom'=> 83, 'alive'=>true, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]
        ];

        DB::table('tamagotchis')->insert($tamagotchis);
    }
}

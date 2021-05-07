<?php

use App\Entrance;
use Illuminate\Database\Seeder;

class EntranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entrance::create([
            'type' => 'A'
        ]);
        Entrance::create([
            'type' => 'B'
        ]);
        Entrance::create([
            'type' => 'C'
        ]);
        Entrance::create([
            'type' => 'D'
        ]);
        Entrance::create([
            'type' => 'E'
        ]);
    }
}

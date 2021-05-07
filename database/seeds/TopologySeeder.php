<?php

use App\Topology;
use Illuminate\Database\Seeder;

class TopologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topology::create([
            'type' => 'T3'
        ]);
        Topology::create([
            'type' => 'T4'
        ]);
        Topology::create([
            'type' => 'T5'
        ]);
    }
}

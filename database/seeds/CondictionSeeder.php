<?php

use App\Condiction;
use Illuminate\Database\Seeder;

class CondictionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Condiction::create([
            'type' => 'Já foi usado'
        ]);
        Condiction::create([
            'type' => 'Nunca foi usado'
        ]);
    }
        
}

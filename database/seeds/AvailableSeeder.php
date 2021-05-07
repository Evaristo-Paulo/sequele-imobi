<?php

use App\Available;
use Illuminate\Database\Seeder;

class AvailableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Available::create([
            'type' => 'Imediatamente'
        ]);
        Available::create([
            'type' => 'Deve ser acordado'
        ]);
    }
}

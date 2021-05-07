<?php

use App\Flat;
use Illuminate\Database\Seeder;

class FlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Flat::create([
            'type' => 'Reu do Chão'
        ]);
        Flat::create([
            'type' => '1º Andar'
        ]);
        Flat::create([
            'type' => '2º Andar'
        ]);
        Flat::create([
            'type' => '3º Andar'
        ]);
        Flat::create([
            'type' => '4º Andar'
        ]);
        Flat::create([
            'type' => '5º Andar'
        ]);
        Flat::create([
            'type' => '6º Andar'
        ]);
        Flat::create([
            'type' => '7º Andar'
        ]);
        Flat::create([
            'type' => '8º Andar'
        ]);
        Flat::create([
            'type' => '9º Andar'
        ]);
        Flat::create([
            'type' => '10º Andar'
        ]);
    }
}

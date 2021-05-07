<?php

use App\Negociable;
use Illuminate\Database\Seeder;

class NegociatableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Negociable::create([
            'type' => 'Negociável'
        ]);
        Negociable::create([
            'type' => 'Não negociável'
        ]);
    }
}

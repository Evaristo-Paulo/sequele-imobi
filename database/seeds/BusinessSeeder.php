<?php

use App\Business;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create([
            'type' => 'Aluguel'
        ]);
        Business::create([
            'type' => 'Trespasse'
        ]);
        Business::create([
            'type' => 'Venda'
        ]);
    }
}

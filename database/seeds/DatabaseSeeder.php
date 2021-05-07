<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenderSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(NegociatableSeeder::class);
        $this->call(TopologySeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(MunicipeSeeder::class);
        $this->call(AvailableSeeder::class);
        $this->call(FlatSeeder::class);
        $this->call(BlockSeeder::class);
        $this->call(BusinessSeeder::class);
        $this->call(CondictionSeeder::class);
        $this->call(EntranceSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
    }
}

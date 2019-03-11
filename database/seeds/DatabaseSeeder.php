<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(OrgSeeder::class);
        $this->call(FlightSeeder::class);
        $this->call(SeatTypeSeeder::class);
        $this->call(ChairSeeder::class);
    }
}

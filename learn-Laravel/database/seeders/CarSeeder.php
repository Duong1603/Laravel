<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; 
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;



class CarSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Car::factory()->count(20)->create();
    }
}
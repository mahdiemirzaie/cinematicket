<?php

namespace Database\Seeders;

use App\Models\Cinema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cinema::factory(3)->create()->each(function (Cinema $cinema){
            $cinema->comments()->create([
                'content'=>fake()->text(5)]);
        });
    }
}

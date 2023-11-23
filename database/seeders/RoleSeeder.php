<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    public function run(): void
    {
        foreach (['user', 'admin','artist','director'] as $role) {
            Role::factory(10)->create([
                'name'=>$role
            ]);
        }
    }
}

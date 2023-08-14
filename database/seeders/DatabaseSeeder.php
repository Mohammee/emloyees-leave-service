<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

//         \App\Models\User::factory()->create([
//             'name' => 'Ali Samy',
//             'email' => 'ali@gmail.com',
//             'role' => 'admin'
//         ]);

        \App\Models\Admin::factory()->create([
            'name' => 'Mohammad AboSultan',
            'email' => 'admin@gmail.com',
        ]);
    }
}

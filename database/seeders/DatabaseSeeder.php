<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
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

        DB::table('clinics')->insert([
            'name' => 'STI',
            'id' => 1,

        ]);
        DB::table('clinics')->insert([
            'name' => 'HIV',
            'id' => 2,

        ]);
        DB::table('clinics')->insert([
            'name' => 'Infectious Diseases',
            'id' => 3,

        ]);
        DB::table('clinics')->insert([
            'name' => 'Prep',
            'id' => 4,

        ]);
    }
}

<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => "Admin@clinic.com",
            'role'=>'1',
            'surName'=>'admin',
            'dateOfBirth'=>'1998-08-17',
            'phone'=>'071727371',
            'password'=>hash::make('admin123' )
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

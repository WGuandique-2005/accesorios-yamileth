<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insertOrIgnore([
            'name'            => 'brisa',
            'email'           => 'briseilyh@gmail.com',
            'numero_contacto' => null,
            'rol'             => 'admin',
            'password'        => Hash::make('admin1234'),
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);
    }
}
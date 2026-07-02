<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class OfficerSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin Himaris',
            'email'    => 'admin@himaris.ac.id',
            'password' => bcrypt('12341234'),
            'role'     => 'officer',
        ]);
    }
}
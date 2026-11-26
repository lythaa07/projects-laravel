<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1 akun tetap untuk pengujian login Admin
        User::factory()->create([
            'name' => 'Admin Tokoku',
            'email' => 'admin@tokoku.test',
            'password' => Hash::make('password'),
        ]);

        // 10 akun pelanggan acak
        User::factory()->count(10)->create();
    }
}

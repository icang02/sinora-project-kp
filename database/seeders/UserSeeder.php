<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin BKKBN',
            'email' => 'admin@gmail.com',
            'level' => 'Administrator',
            'password' => Hash::make('admin'),
        ]);
        User::create([
            'name' => 'Operator',
            'email' => 'user@gmail.com',
            'level' => 'User',
            'password' => Hash::make('user'),
        ]);

        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => 'Operator',
                'email' => Str::random() . '@gmail.com',
                'level' => 'User',
                'password' => Hash::make('user'),
            ]);
        }
    }
}

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
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'level' => 'Administrator',
            'password' => Hash::make('admin123'),
        ]);
        User::create([
            'name' => 'Pegawai',
            'email' => 'pegawai@gmail.com',
            'level' => 'Pegawai',
            'password' => Hash::make('pegawai'),
        ]);

        // for ($i = 0; $i < 3; $i++) {
        //     User::create([
        //         'name' => 'Operator',
        //         'email' => Str::random() . '@gmail.com',
        //         'level' => 'Pegawai',
        //         'password' => Hash::make('user'),
        //     ]);
        // }
    }
}

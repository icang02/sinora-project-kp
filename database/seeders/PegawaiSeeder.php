<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::create([
            'nama' => 'Ilmi Faizan',
            'nip' => '123123123123123123',
            'jabatan' => 'Kepala BKKBN',
            'pangkat' => 'Gol IV',
            'email' => 'ilmifaizan1112@gmail.com',
            'password' => Hash::make('password'),
        ]);
        Pegawai::create([
            'nama' => 'Esy Anugerah Rahayu Kasim',
            'nip' => '121121121121121121',
            'jabatan' => 'Kabid ADPIN',
            'pangkat' => 'Gol IV',
            'email' => 'esyanugrah02@gmail.com',
            'password' => Hash::make('password'),
        ]);
        Pegawai::create([
            'nama' => 'Miftahul Jannah Salam',
            'nip' => '321321321321321321',
            'jabatan' => 'SubKoordinator ADIN',
            'pangkat' => 'Gol IV',
            'email' => 'mitajs02@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}

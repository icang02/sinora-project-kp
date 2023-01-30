<?php

namespace Database\Seeders;

use App\Models\Peserta;
use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Peserta::create([
            'rapat_id' => 1,
            'nama' => 'Budiyantoso',
            'jabatan' => 'Sekretaris',
            'nip' => '123456789',
            'keterangan' => 'Hadir',
        ]);
        Peserta::create([
            'rapat_id' => 1,
            'nama' => 'Andi Kumala',
            'jabatan' => 'Kabid',
            'nip' => '987654321',
            'keterangan' => 'Perjalanan Dinas',
        ]);
        Peserta::create([
            'rapat_id' => 1,
            'nama' => 'Cecep',
            'jabatan' => 'SubKoordinator',
            'nip' => '112233e45',
            'keterangan' => 'Sakit',
        ]);
    }
}

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
            'nip' => '198802040311221312',
            'keterangan' => 'Hadir',
        ]);
        Peserta::create([
            'rapat_id' => 1,
            'nama' => 'Andi Kumala',
            'jabatan' => 'Kabid',
            'nip' => '198002342311231312',
            'keterangan' => 'Perjalanan Dinas',
        ]);
        Peserta::create([
            'rapat_id' => 1,
            'nama' => 'Cecep',
            'jabatan' => 'SubKoordinator',
            'nip' => '199002040311211311',
            'keterangan' => 'Sakit',
        ]);
    }
}

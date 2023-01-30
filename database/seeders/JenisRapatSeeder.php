<?php

namespace Database\Seeders;

use App\Models\JenisRapat;
use Illuminate\Database\Seeder;

class JenisRapatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisRapat::create(['nama' => 'Rapat Pimpinan (Rapim)']);
        JenisRapat::create(['nama' => 'Rapat Staff']);
        JenisRapat::create(['nama' => 'Rapat Komponen']);
        JenisRapat::create(['nama' => 'Rapat Pembinaan Pegawai']);
        JenisRapat::create(['nama' => 'Rapat Bersama Mitra/Stakeholders']);
        JenisRapat::create(['nama' => 'Sosialisasi/Orientasi/Workshop']);
        JenisRapat::create(['nama' => 'Apel Kantor']);
        JenisRapat::create(['nama' => 'Rapat Teknis Kegiatan']);
    }
}

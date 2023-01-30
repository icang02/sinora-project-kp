<?php

namespace Database\Seeders;

use App\Models\Rapat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RapatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rapat = Rapat::orderBy('id', 'DESC')->get()->first();
        $rapatId = 1;
        if ($rapat != null) {
            $rapatId = $rapat->id;
            $rapatId++;
        }

        Rapat::create([
            'jenis_rapat_id' => 3,
            'kode' => 'R.' . str_pad($rapatId, 4, '0', STR_PAD_LEFT) . '.' . date('Y'),
            'nama' => 'Rapat Penyuluhan KB',
            'slug' => Str::slug('Rapat Penyuluhan KB'),
            'ruang' => 'Aula Kantor BKKBN',
            'pengisi_rapat' => 'Kabid, Kepala, Sekretaris',
            'pimpinan_rapat' => 'Agus Salim, S.E., M.E.',
            'tanggal' => '2023-01-30',
            'mulai' => '08:00',
            'selesai' => '11:30',
            'status' => 'belum dimulai',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Divisi::create(['nama' => 'Kepala']);
        Divisi::create(['nama' => 'Sekretaris']);

        Divisi::create(['nama' => 'Kasubbag. Perencanaan']);
        Divisi::create(['nama' => 'Kasubbag. Umum & Humas']);
        Divisi::create(['nama' => 'Kasubbag. Keuangan & BMN']);
        Divisi::create(['nama' => 'Kasubbag. Kepeg. & Hukum']);
        Divisi::create(['nama' => 'Kasubbag. ADM. Pengawasan']);

        Divisi::create(['nama' => 'Kabid. ADPIN']);
        Divisi::create(['nama' => 'Kasubbid. Advokasi dan KIE']);
        Divisi::create(['nama' => 'Kasubbid. Hubungan Antar Lembaga & Bina Lini Lapangan']);
        Divisi::create(['nama' => 'Kasubbid. Data dan Informasi']);

        Divisi::create(['nama' => 'Kabid. Dalduk']);
        Divisi::create(['nama' => 'Kasubbid. Penyusunan Parameter Pengendalian Penduduk']);
        Divisi::create(['nama' => 'Kasubbid. Kerjasama Pendidikan Kependudukan']);
        Divisi::create(['nama' => 'Kasubbid. Analisis Dampak Kependudukan']);

        Divisi::create(['nama' => 'Kabid. KB-KR']);
        Divisi::create(['nama' => 'Kasubbid. Bina Kesertaan KB Jalur PEM. & Swasta']);
        Divisi::create(['nama' => 'Kasubbid. Bina Keser. KB Jalur Wilayah & Sasaran Khusus']);
        Divisi::create(['nama' => 'Kasubbid. Kesehatan Reproduksi']);

        Divisi::create(['nama' => 'Kabid. KS-PK']);
        Divisi::create(['nama' => 'Kasubbid. BKB, Anak & Ketahanan Keluarga Lansia']);
        Divisi::create(['nama' => 'Kasubbid. Bina Ketahanan Remaja']);
        Divisi::create(['nama' => 'Kasubbid. Bina Pemberdayaan Ekonomi Keluarga']);

        Divisi::create(['nama' => 'Kabid. Latbang']);
        Divisi::create(['nama' => 'Kasubbid. Tata Operasional']);
        Divisi::create(['nama' => 'Kasubbid. Program dan Kerjasama']);
        Divisi::create(['nama' => 'Kasubbid. Penyelenggaraan dan Evaluasi']);

        Divisi::create(['nama' => 'Kelompok Jabatan Fungsional']);
    }
}

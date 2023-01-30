<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Peserta;
use App\Models\Rapat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthAbsenController extends Controller
{
    public function index()
    {
        return view('auth.absen', [
            'title' => 'Absensi',
            'divisi' => Divisi::all(),
        ]);
    }

    public function processAbsen(Request $request)
    {
        $rapat = Rapat::where('kode', $request->kode)->get()->first();

        if ($rapat != null) {

            // Cek waktu rapat
            $tgl_skrng = date('Y-m-d');
            $jam_skrng = date('H:i');

            if ($rapat->status == 'belum dimulai') {
                return back()->with('info', "\"$rapat->nama\" belum dimulai.")->withInput();
            }

            if ($tgl_skrng >= $rapat->tanggal && $jam_skrng >= $rapat->mulai) {
                $rules = [
                    'kode' => 'required',
                    'nama' => 'required',
                    'nip' => 'required',
                ];

                $jabatan = $request->jabatan;
                if ($request->jabatan_lain != null) {
                    $jabatan = $request->jabatan_lain;
                }

                $request->validate($rules);

                $peserta = Peserta::where('nip', $request->nip)->get();
                if ($peserta->count() > 0) {
                    return back()->with('info', 'Anda sudah pernah melakukan presensi.')->withInput();
                }

                $rapatId = $rapat->id;
                $keterangan = $request->keterangan;
                if ($request->keterangan_lain != null) {
                    $keterangan = Str::title($request->keterangan_lain);
                }
                Peserta::create([
                    'rapat_id' => $rapatId,
                    'nama' => ucfirst($request->nama),
                    'nip' => $request->nip,
                    'jabatan' => strtoupper($jabatan),
                    'keterangan' => $keterangan,
                ]);

                return back()->with('success', "Selamat Anda sudah melakukan presensi pada agenda \"$rapat->nama\".");
            }

            return back()->with('info', "Belum dapat melakukan presensi. Rapat dimulai pukul \"<b>$rapat->mulai - $rapat->selesai WITA</b>\".")->withInput();
        } else {
            return back()->with('danger', 'Kode rapat salah atau rapat tidak ditemukan.')->withInput();
        }
    }
}

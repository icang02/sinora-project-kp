<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\FileAbsen;
use App\Models\Peserta;
use App\Models\Rapat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PDF;

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
        // dd($request->all());
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
                if ($keterangan == null && $request->keterangan_lain == null) {
                    return back()->with('danger', 'Keterangan belum diisi.')->withInput();
                }
                if ($keterangan == null) $keterangan = $request->keterangan_lain;
                if ($request->keterangan_lain != null) {
                    $keterangan = Str::title($request->keterangan_lain);
                }
                Peserta::create([
                    'rapat_id' => $rapatId,
                    'nama' => ucfirst($request->nama),
                    'nip' => $request->nip,
                    'jabatan' => ucfirst($jabatan),
                    'keterangan' => $keterangan,
                ]);

                return back()->with('success', "Selamat Anda sudah melakukan presensi pada agenda \"$rapat->nama\".");
            }

            return back()->with('info', "Belum dapat melakukan presensi. Rapat dimulai pukul \"<b>$rapat->mulai - $rapat->selesai WITA</b>\".")->withInput();
        } else {
            return back()->with('danger', 'Kode rapat salah atau rapat tidak ditemukan.')->withInput();
        }
    }

    public function uploadAbsen(Request $request, $rapatId)
    {
        $request->validate([
            'file' => 'file|mimes:docx,doc,xlsx,pdf|max:5120,'
        ], [
            'mimes' => 'Upload file dengan .docx, .doc, .xlsx, atau .pdf.',
            'max' => 'Ukuran file maksimal 5MB.',
        ]);

        $fileAbsen = FileAbsen::where('rapat_id', $rapatId)->get()->first();
        $fileAsli = $request->file('file')->getClientOriginalName();
        $file = $request->file('file')->store('file-absen');

        if ($fileAbsen != null) {
            Storage::delete($fileAbsen->file);

            $fileAbsen->update([
                'file' => $file,
                'file_asli' => $fileAsli,
            ]);
        } else {
            FileAbsen::create([
                'rapat_id' => $rapatId,
                'file' => $file,
                'file_asli' => $fileAsli,
            ]);
        }

        return back()->with('success', 'File absen berhasil diupload.');
    }

    public function downloadAbsen($id)
    {
        $fileAbsen = FileAbsen::find($id);
        $file = $fileAbsen->file;
        $fileAsli = $fileAbsen->file_asli;

        return Storage::download($file, $fileAsli);
    }

    public function printAbsen(Rapat $rapat)
    {
        $data = [
            'peserta' => $rapat->peserta,
            'rapat' => $rapat
        ];

        $pdf = PDF::loadView('template.absensi', $data, [], []);

        return $pdf->stream('absensi-' . $rapat->slug . '.pdf');
    }
}

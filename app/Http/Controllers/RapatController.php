<?php

namespace App\Http\Controllers;

use App\Models\JenisRapat;
use App\Models\Notulen;
use App\Models\Peserta;
use App\Models\Rapat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RapatController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.rapat', [
            'title' => 'Data Rapat',
            'rapat' => Rapat::orderBy('tanggal')->get(),
            'jenisRapat' => JenisRapat::all(),
        ]);
    }

    public function addRapat(Request $request)
    {
        $request->validate([
            'jenis_rapat' => 'required',
            'nama' => 'required',
            'ruang' => 'required',
            'pengisi_rapat' => 'required',
            'pimpinan_rapat' => 'required',
            'tanggal' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
        ]);

        // Generate kode secara increment
        $rapat = Rapat::orderBy('id', 'DESC')->get()->first();
        $rapatId = 1;
        if ($rapat != null) {
            $rapatId = $rapat->id;
            $rapatId++;
        }

        Rapat::create([
            'jenis_rapat_id' => $request->jenis_rapat,
            'kode' => 'R.' . str_pad($rapatId, 4, '0', STR_PAD_LEFT) . '.' . date('Y'),
            'nama' => Str::title($request->nama),
            'slug' => Str::slug($request->nama),
            'ruang' => ucfirst($request->ruang),
            'pengisi_rapat' => ucfirst($request->pengisi_rapat),
            'pimpinan_rapat' => ucfirst($request->pimpinan_rapat),
            'tanggal' => $request->tanggal,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
        ]);

        return redirect()->route('rapat')->with('success', 'Rapat berhasil dibuat.');
    }

    public function detailRapat(Rapat $rapat)
    {

        return view('dashboard.admin.detail-rapat', [
            'title' => 'Detail Rapat',
            'rapat' => $rapat,
            'peserta' => $rapat->peserta,
            'jumlahPeserta' => Peserta::where('rapat_id', $rapat->id)->where('keterangan', 'Hadir')->get()->count(),
        ]);
    }

    public function updateRapat(Request $request, Rapat $rapat)
    {
        $request->validate([
            'jenis_rapat' => 'required',
            'nama' => 'required',
            'ruang' => 'required',
            'pengisi_rapat' => 'required',
            'pimpinan_rapat' => 'required',
            'tanggal' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'status' => 'required',
        ]);

        $rapat->update([
            'jenis_rapat_id' => $request->jenis_rapat,
            'nama' => Str::title($request->nama),
            'slug' => Str::slug($request->nama),
            'ruang' => ucfirst($request->ruang),
            'pengisi_rapat' => ucfirst($request->pengisi_rapat),
            'pimpinan_rapat' => ucfirst($request->pimpinan_rapat),
            'tanggal' => $request->tanggal,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'status' => $request->status,
        ]);
        return back()->with('success', 'Data rapat berhasil diupdate.');
    }
}
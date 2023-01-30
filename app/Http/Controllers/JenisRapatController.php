<?php

namespace App\Http\Controllers;

use App\Models\JenisRapat;
use Illuminate\Http\Request;

class JenisRapatController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.jenis-rapat', [
            'title' => 'Jenis Rapat',
            'rapat' => JenisRapat::orderBy('nama')->get(),
        ]);
    }

    public function addJenisRapat(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:jenis_rapat',
        ]);

        JenisRapat::create(['nama' => ucfirst($request->nama)]);
        return back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function deleteJenisRapat($id)
    {
        $jenisRapat = JenisRapat::findOrFail($id);
        $nama = $jenisRapat->nama;

        $jenisRapat->delete();
        return back()->with('success', "Jenis rapat \"<b>$nama</b>\" berhasil dihapus.");
    }

    public function updateJenisRapat(Request $request, $id)
    {
        $jenisRapat = JenisRapat::findOrFail($id);

        $rules = ['nama' => 'required|unique:jenis_rapat'];
        if ($jenisRapat->nama == $request->nama) {
            // $rules = ['nama' => 'required'];
            return back()->with('info', 'Tidak ada perubahan data.');
        }
        $request->validate($rules);

        $jenisRapat->update(['nama' => ucfirst($request->nama)]);
        return back()->with('success', 'Jenis rapat berhasil diupdate.');
    }
}

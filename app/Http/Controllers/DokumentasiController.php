<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Models\Rapat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    public function index(Rapat $rapat)
    {
        return view('dashboard.admin.dokumentasi', [
            'title' => 'Dokumentasi',
            'rapat' => $rapat,
        ]);
    }

    public function upload(Request $request, $rapatId)
    {
        // $request->validate([
        //     'foto' => 'image|mimes:png,jpg,jpeg|max:2048,'
        // ], [
        //     'image' => 'File upload bukan berformat gambar.',
        //     'mimes' => 'Upload foto dengan format .png, .jpg, atau .jpeg.',
        //     'max' => 'Ukuran file maksimal 5MB.',
        // ]);

        // dd($rapatId);
        $fotos = $request->file('foto');
        foreach ($fotos as $foto) {
            $img = $foto->store('dokumentasi');

            Dokumentasi::create([
                'rapat_id' => $rapatId,
                'foto' => $img,
            ]);
        }
        return back()->with('success', 'Unggah foto berhasil.');
    }

    public function delete(Dokumentasi $foto)
    {
        Storage::delete($foto->foto);
        $foto->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}

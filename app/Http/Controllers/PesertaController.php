<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PesertaController extends Controller
{
    public function addPeserta(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|unique:peserta'
        ]);
        if ($validator->fails()) {
            return back()->with('danger', 'Peserta rapat sudah ada.');
        }

        $keterangan = $request->keterangan;
        if ($request->keterangan_lain != null) {
            $keterangan = Str::title($request->keterangan_lain);
        }

        Peserta::create([
            'rapat_id' => $request->rapat_id,
            'nama' => ucfirst($request->nama),
            'jabatan' => ucfirst($request->jabatan),
            'nip' => $request->nip,
            'keterangan' => $keterangan,
        ]);

        return back()->with('success', 'Peserta rapat berhasil ditambahkan.');
    }

    public function deletePeserta(Peserta $peserta)
    {
        $peserta->delete();
        return back()->with('success', 'Peserta rapat berhasil dihapus.');
    }
}

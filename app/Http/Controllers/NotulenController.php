<?php

namespace App\Http\Controllers;

use App\Models\Notulen;
use App\Models\Peserta;
use App\Models\Rapat;
use Illuminate\Http\Request;

class NotulenController extends Controller
{
    public function index()
    {
        if (request()->session()->has('isLogin')) {
            return redirect()->route('isi.notulen', session('isLogin'));
        }

        return view('auth.notulen', [
            'title' => 'Notulensi',
        ]);
    }

    public function checkKode(Request $request)
    {
        $rapat = Rapat::where('kode', $request->kode)->get()->first();

        if ($rapat != null) {

            if ($rapat->status == 'selesai') {
                return back()->with('info', 'Rapat telah berakhir.')->withInput();
            }

            $cekNotulen = Notulen::where('rapat_id', $rapat->id)->get()->toArray();
            if ($cekNotulen == null) {
                Notulen::create(['rapat_id' => $rapat->id]);
            }
            if ($rapat->status != 'sedang berjalan') {
                $rapat->update(['status' => 'sedang berjalan']);
            }

            session(['isLogin' => $rapat->kode]);
            return redirect()->intended("notulen/$rapat->kode");
        } else {
            return back()->with('danger', 'Kode rapat salah atau rapat tidak ditemukan.')->withInput();
        }
    }

    public function indexNotulen(Rapat $rapat)
    {
        // Membuat session
        if (!session('isLogin')) {
            return redirect()->route('notulen');
        }

        return view('auth.index-notulen', [
            'title' => 'Index Notulen',
            'rapat' => $rapat->first(),
            'notulen' => Notulen::where('rapat_id', $rapat->id)->get()->first(),
            'jumlahPeserta' => Peserta::where('rapat_id', $rapat->id)->where('keterangan', 'Hadir')->get()->count(),
        ]);
    }

    public function saveNotulen(Request $request, Notulen $notulen)
    {
        // dd($request->all());
        $notulen->update([
            'notulis' => ucfirst($request->notulis),
            'nip' => $request->nip,
            'jabatan' => ucfirst($request->jabatan),
            'divisi' => ucfirst($request->divisi),
            'pangkat' => 'Penata',
            'pembahasan' => $request->pembahasan,
        ]);

        return back()->with('success', 'Data notulen disimpan.');
    }

    public function notulenLogout(Request $request)
    {
        $request->session()->forget('isLogin');
        return redirect()->route('notulen');
    }

    public function akhiriRapat(Request $request)
    {
        $rapat = Rapat::find($request->rapat_id);
        $rapat->update(['status' => 'selesai']);
        $request->session()->forget('isLogin');

        return redirect()->route('notulen')->with('success', 'Terima kasih data rapat telah disimpan.');
    }
}

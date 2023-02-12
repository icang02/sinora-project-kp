<?php

namespace App\Http\Controllers;

use App\Models\Notulen;
use App\Models\Peserta;
use App\Models\Rapat;
use Illuminate\Http\Request;
use PDF;

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
            'pangkat' => 'Penata',
            'pembahasan' => $request->pembahasan,
        ]);

        $rapat = Rapat::find($notulen->rapat_id);
        $rapat->update([
            'nama' => ucfirst($request->nama),
            'pimpinan_rapat' => ucfirst($request->pimpinan_rapat),
            'pengisi_rapat' => ucfirst($request->pengisi_rapat),
            'ruang' => ucfirst($request->ruang),
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
        $notulen = Notulen::findOrFail($request->notulen_id);
        if (
            $notulen->nip == null ||
            $notulen->jabatan == null ||
            $notulen->pangkat == null ||
            $notulen->pembahasan == null
        ) {
            return back()->with('danger', 'Data rapat belum lengkap.')->withInput();
        }

        $rapat = Rapat::find($request->rapat_id);
        $rapat->update(['status' => 'selesai']);
        $request->session()->forget('isLogin');

        return redirect()->route('notulen')->with('success', 'Terima kasih data rapat telah disimpan.');
    }

    public function editNotulen(Request $request, $id)
    {
        return view(
            'dashboard.admin.edit-notulen',
            [
                'title' => 'Edit Notulen',
                'notulen' => Notulen::find($id),
            ]
        );
    }

    public function updateNotulen(Request $request, Notulen $notulen)
    {
        $request->validate([
            'notulis' => 'required',
            'nip' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'pembahasan' => 'required',
        ], [
            'required' => 'Pembahasan rapat belum diisi.'
        ]);

        $notulen->update([
            'notulis' => ucfirst($request->notulis),
            'nip' => $request->nip,
            'pangkat' => ucfirst($request->pangkat),
            'jabatan' => ucfirst($request->jabatan),
            'pembahasan' => $request->pembahasan,
        ]);

        return redirect()->route('detail.rapat', $notulen->rapat->slug)->with('success', 'Data notulen berhasil diupdate.');
    }

    public function viewPdf($id)
    {
        $data = Notulen::findOrFail($id);
        $notulen = [
            'notulen' => $data,
            'jumlahPeserta' => Peserta::where('rapat_id', $data->id)->where('keterangan', 'Hadir')->get()->count(),
        ];

        $pdf = PDF::loadView('template.notulen', $notulen, [], []);

        if (request()->is('lihat-notulen/unduh*')) {
            return $pdf->download('notulen-' . $data->rapat->slug . '.pdf');
        }
        dd($pdf->stream('notulen-' . $data->rapat->slug . '.pdf'));
        // return $pdf->stream('notulen-' . $data->rapat->slug . '.pdf');
    }
}

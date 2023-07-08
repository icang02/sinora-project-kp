<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Notulen</title>
    <style>
        body {
            font-family: 'times-new-roman', sans-serif;
        }
    </style>
</head>
</head>

<body>
    <div style="line-height:23px;">

        <table width="100%" ellpadding="0" cellspacing="0" style="line-height:23px;">
            <tr>
                <td>
                    {{-- <img src="{{ url('img/bkkbn.png') }}" alt="Logo" width="120" style="margin-top: -40px;"> --}}
                </td>
                <td style="text-align: center;">
                    <div>PERWAKILAN BADAN KEPENDUDUKAN DAN</div>
                    <div>KELUARGA BERENCANA NASIONAL PROVINSI SULAWESI TENGGARA</div>
                    <small>Jl. Balaikota no. 5 Kendari, Sulawesi Tenggara 93117</small> <br>
                    <small>Telp. (0401) 3121563, FaX. (0401) 3121009, Website : sultra.bkkbn.go.id</small>
                </td>
            </tr>
        </table>

        <hr style="height: 2px;">

        <div style="margin-top: 15px;">
            <div style="font-weight: bold; text-align: center; margin-bottom: 20px;">
                {{ $notulen->rapat->jenis_rapat->nama }}
            </div>

            <table width="100%" cellpadding="0" cellspacing="0" style="line-height:23px;">
                <tr>
                    <td width="160">Agenda Rapat</td>
                    <td>:&nbsp; {{ $notulen->rapat->nama }}</td>
                </tr>
                <tr>
                    <td>Hari, tanggal</td>
                    <td>:&nbsp;
                        {{ Carbon\Carbon::createFromDate($notulen->rapat->tanggal)->translatedFormat('l, jS F Y') }}
                    </td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td>:&nbsp; {{ $notulen->rapat->mulai }} - {{ $notulen->rapat->selesai }} WITA</td>
                </tr>
                <tr>
                    <td>Ruang Rapat</td>
                    <td>:&nbsp; {{ $notulen->rapat->ruang }}</td>
                </tr>
                <tr>
                    <td>Pimpinan Rapat</td>
                    <td>:&nbsp; {{ $notulen->rapat->pimpinan_rapat }}</td>
                </tr>
                <tr>
                    <td>Pengisi Rapat</td>
                    <td>:&nbsp; {{ $notulen->rapat->pengisi_rapat }}</td>
                </tr>
                {{-- <tr>
          <td>Peserta Rapat</td>
          <td>:&nbsp; {{ $jumlahPeserta . ' orang' ?? '-' }}</td>
        </tr> --}}
                <tr>
                    <td>Notulis</td>
                    <td>:&nbsp; {{ $notulen->notulis ?? '-' }}</td>
                </tr>
            </table>
        </div>

        <div style="margin: 30px 0px; text-align: justify;">
            {!! $notulen->pembahasan !!}
        </div>

        <table width="100%" ellpadding="0" cellspacing="0" style="line-height:23px; text-align: center;">
            <tr>
                <td width="50%"></td>
                <td>
                    <div>Pembuat Notulen, </div>
                    <div>{{ $notulen->jabatan }} / {{ $notulen->pangkat }}</div><br><br><br>
                    <div>{{ $notulen->notulis }}</div>
                    {{-- <div>{{ $notulen->jabatan }}</div> --}}
                    <div>NIP : {{ $notulen->nip }}</div>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Absensi</title>
    <style>
        body {
            font-family: 'times-new-roman', sans-serif;
        }
    </style>
</head>

<body>
    <div style="line-height:23px;">

        <table width="100%" ellpadding="0" cellspacing="0" style="line-height:23px;">
            <tr>
                <td>
                    {{-- <img src="{{ asset('img/favicon.ico') }}" alt="Logo" width="120" style="margin-top: -40px;"> --}}
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
            <div style="font-weight: bold; text-align: center; margin-bottom: 20px;">DAFTAR PRESENSI RAPAT
            </div>

            <table width="100%" cellpadding="0" cellspacing="0" style="line-height:23px;">
                <tr>
                    <td width="160">Agenda</td>
                    <td>:&nbsp; {{ $rapat->nama }}</td>
                </tr>
                <tr>
                    <td>Hari, tanggal</td>
                    <td>
                        :&nbsp; {{ Carbon\Carbon::createFromDate($rapat->tanggal)->translatedFormat('l, jS F Y') }}
                    </td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td>:&nbsp; {{ $rapat->mulai . ' - ' . $rapat->selesai . ' WITA' }}</td>
                </tr>
                <tr>
                    <td>Ruang Rapat</td>
                    <td>:&nbsp; {{ $rapat->ruang }}</td>
                </tr>
            </table>
        </div>

        <style>
            #table td,
            #table th {
                border: 0.5px solid;
            }
        </style>

        <div style="margin: 30px 0px; text-align: justify;">
            <table id="table" width="100%" cellpadding="3" cellspacing="0" style="line-height:23px;">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th style="width: 200px;">Nama Lengkap</th>
                        <th style="width: 150px;">NIP</th>
                        <th>Jabatan</th>
                        <th style="width: 130px;">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peserta as $item)
                        <tr>
                            <td align="center">{{ $loop->iteration }}.</td>
                            <td style="padding-left: 8px; padding-right: 8px;">{{ $item->nama }}</td>
                            <td align="center">{{ $item->nip }}</td>
                            <td align="center">{{ $item->jabatan }}</td>
                            <td align="center">{{ $item->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>

        <br>

        <table width="100%" ellpadding="0" cellspacing="0" style="line-height:23px; text-align: center;">
            <tr>
                <td width="50%"></td>
                <td>
                    <div>Kendari, {{ Carbon\Carbon::createFromDate($rapat->tanggal)->translatedFormat('jS F Y') }}
                    </div>
                    <div>Pemimpin Rapat,</div>
                    <br><br><br>
                    <div style="font-weight: bold; text-decoration: underline;">{{ $rapat->pimpinan_rapat }}</div>
                    <div style="font-weight: bold;">NIP : {{ $rapat->nip_pimpinan }}</div>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>

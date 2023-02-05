<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
  <title>Cetak Notulen</title>

  <style>
    @page {
      size: auto;
      margin: 5mm 10mm;
    }

    body {
      background: rgb(204, 204, 204);
    }

    page {
      background: white;
      display: block;
      margin: 0 auto;
    }

    page[size="A4"] {
      width: 21cm;
      height: 29.7cm;
      margin-top: 1cm;
    }

    @media print {

      body,
      page {
        width: 21cm;
        height: 29.7cm;
        margin: 0;
      }
    }
  </style>

  <style type="text/css">
    table {
      border-style: double;
      border-width: 3px;
      border-color: white;
      width: 20cm;
      text-align: justify;
    }

    table tr .text2 {
      text-align: right;
    }

    table tr td,
    .text-h {
      font-size: 18px;
    }

    /* table tr .text3 {
      font-size: 1 !important;
    } */

    table tr .text {
      text-align: center;
      font-size: 18px;
    }
  </style>
</head>

<body>
  <page size="A4">
    <center>
      <table>
        <tr>
          <td><img src="{{ asset('img') }}/bkkbn.png" width="110" /></td>
          <td>
            <center>
              <font size="4">PEMERINTAH PROVINSI SULAWESI TENGGARA</font><br />
              <font size="4"><b>BADAN KEPENDUDUKAN DAN KELUARGA BERENCANA NASIONAL</b></font><br />
              <font size="2">Bidang Keahlian : Bisnis dan Menejemen - Teknologi informasi
                dan Komunikasi</font><br />
              <font size="2"><i>Jln Cut Nya'Dien No. 02 Kode Pos : 68173 Telp./Fax
                  (0331)758005 Tempurejo Jember Jawa Timur</i></font>
            </center>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <hr />
          </td>
        </tr>
      </table>

      <h5 class="text-h">{{ $notulen->rapat->jenis_rapat->nama }}</h5>

      <table class="text">
        <tr class="text2">
          <td>Agenda Rapat</td>
          <td width="572">:&nbsp; {{ $notulen->rapat->nama }}</td>
        </tr>
        <tr>
          <td>Hari, tanggal</td>
          <td width="564">:&nbsp;
            {{ Carbon\Carbon::createFromDate($notulen->rapat->tanggal)->translatedFormat('l, jS F Y') }}</td>
        </tr>
        <tr>
          <td>Waktu</td>
          <td width="564">:&nbsp; {{ $notulen->rapat->mulai }} - {{ $notulen->rapat->selesai }} WITA</td>
        </tr>
        <tr>
          <td>Ruang Rapat</td>
          <td width="564">:&nbsp; {{ $notulen->rapat->ruang }}</td>
        </tr>
        <tr>
          <td>Pimpinan Rapat</td>
          <td width="564">:&nbsp; {{ $notulen->rapat->pimpinan_rapat }}</td>
        </tr>
        <tr>
          <td>Pengisi Rapat</td>
          <td width="564">:&nbsp; {{ $notulen->rapat->pengisi_rapat }}</td>
        </tr>
        <tr>
          <td>Peserta Rapat</td>
          <td width="564">:&nbsp; {{ $notulen->rapat->peserta->count() . ' orang' ?? '-' }}</td>
        </tr>
        <tr>
          <td>Notulis</td>
          <td width="564">:&nbsp; {{ $notulen->notulis }}</td>
        </tr>
      </table>

      <br />

      <table width="625" class="text3">
        <tr>
          <td class="text3">
            {{-- <font> --}}
            {!! $notulen->pembahasan !!}
            {{-- </font> --}}
          </td>
        </tr>
      </table>

      <br />

      {{-- <table width="300" border="1">
        <tr class="text2">
          <td>Kepala Cabang Dinas Pendidikan</td>
        </tr>
        <tr>
          <td>Wilayah Kota Kendari</td>
        </tr>
        <tr>
          <td>{{ $notulen->notulis }}</td>
        </tr>
        <tr>
          <td>{{ $notulen->pangkat }}</td>
        </tr>
        <tr>
          <td>NIP.{{ $notulen->nip }}</td>
        </tr>
      </table> --}}

      <table width="625">
        <tr>
          <td width="430"><br><br><br><br></td>
          <td class="text" align="center">
            Pembuat Notulen,<br><br><br><br><br>{{ $notulen->notulis }} /
            {{ $notulen->jabatan }}<br>{{ $notulen->pangkat }}<br>NIP : {{ $notulen->nip }}
          </td>
        </tr>
      </table>
    </center>
  </page>

  @if (request()->is('lihat-notulen*'))
    <script>
      window.onload = (event) => {
        window.print();
      }
    </script>
  @endif

</body>

</html>

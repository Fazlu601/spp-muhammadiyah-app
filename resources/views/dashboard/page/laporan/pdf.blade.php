<!-- File: resources/views/kwitansi.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            border: 1px solid #000;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
        }
        th {
            text-align: center;
        }
        td {
            text-align: left;
        }
        .logo {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo img {
            max-width: 100px;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
        }
        .title > h3 {
            border-bottom: 3px solid black;
            padding-bottom: 5px;
        }
        .details {
            margin-bottom: 10px;
        }
        .amount {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            margin-bottom: 30px;
        }
        .footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
           SISTEM INFORMASI SPP - SMK MUHAMMADIYAH
        </div>
        <div class="title">
            <h3>DATA PEMBAYARAN SELAMA TAHUN AJARAN {{ $data[0]->TahunAjaran->tahun_pelajaran }}</h3>
        </div>
        <div class="details">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tahun Ajaran</th>
                        <th>Program Studi</th>
                        <th>Kelas</th>
                        <th>Nama Siswa</th>
                        <th>Total SPP</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($data as $item )
                        <tr align="center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->Jenis_pembayaran->TahunAjaran->tahun_pelajaran }}</td>
                            <td>{{ $item->Jenis_pembayaran->Prodi->program_studi }}</td>
                            <td>{{ $item->Jenis_pembayaran->Kelas->kelas }}</td>
                            <td>{{ $item->Siswa->nama_siswa }}</td>
                            <td>Rp. {{ number_format($item->total_biaya) }}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

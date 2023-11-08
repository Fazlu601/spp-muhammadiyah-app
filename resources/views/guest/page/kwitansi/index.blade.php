<!-- File: resources/views/kwitansi.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            margin: 20px auto;
            padding: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th.border, td.border {
            border: 1px solid #000;
            padding: 5px;
        }
        th {
            text-align: center;
            background-color:#264653 ;
            color:#FFFFFF ;
            padding: 5px;
        }
        td {
            text-align: left;
            padding: 8px;
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
        .title-header {
            text-align: left;
        }
        .title-header > p {
            font-size: 12px;
        }
        .title > h5 {
            padding: 5px 0;
            text-align: center;
            border-top: 2px solid gray;
            border-bottom: 2px solid gray;
        }
        .row {
            display: flex;
            margin-bottom: 10px;
        }
        .col-6 {
            widows: 50%;
        }
        .col-10 {
            widows: 80%%;
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
        <div class="title-header">
            <h2>BUKTI PEMBAYARAN <br> SMK MUHAMMADIYAH JAMBI</h2>
            <p>Sungai Gedang, Kel. Sungaigedang, Kec. Singkut, Kab. Sarolangun, Jambi, 37482</p>
        </div>
        <div class="title">
            <h5>KWITANSI</h5>
        </div>
        <div>
            <div class="row">
                <div style="width:40%;float:left;margin-right:70px;">
                    <div class="row">
                        <table class="table">
                            <tr>
                                <td>NAMA SISWA</td>
                                <td>: {{ $data->Siswa->nama_siswa }}</td>
                           </tr>
                          <tr>
                               <td>KELAS</td>
                               <td>: {{ $data->Jenis_pembayaran->Kelas->kelas }}</td>
                          </tr>
                          <tr>
                               <td>JURUSAN</td>
                               <td>: {{ $data->Jenis_pembayaran->Prodi->program_studi }}</td>
                          </tr>
                        </table>
                    </div>
                </div>
                <div style="width:50%;float:left;">
                    <div>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                                 <td>TANGGAL</td>
                                 <td>: {{ $data->created_at }}</td>
                            </tr>
                           <tr>
                                <td>NO. KWITANSI</td>
                                <td>: {{ $data->id }}</td>
                           </tr>
                        </table>
                    </div>
                </div>
                <div style="clear:left;"></div>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered" width="50%" cellspacing="0">
                <tr>
                    <td><b><i>JUMLAH PEMBAYARAN</i></b></td>
                    <td> : Rp. {{ number_format($data->jumlah_transfer) }}</ td>
                </tr>
                <tr>
                    <td><b><i>UNTUK KEPERLUAN</i></b></td>
                    <td> : <i>Pembayaran SPP. Semester <span style="text-transform: uppercase">{{ $data->Pembayaran->semester }}</span></i></td>
                </tr>
                <tr>
                    <td><b><i>TERBILANG</i></b></td>
                    <td style="text-transform: uppercase"> : <b><i> {{ $total_dibayar }}</i></b></td>
                </tr>
            </table>
        </div>
        <div class="row" style="width:50%;">
            <table class="table" style="border:1px solid black;">
                <tr>
                    <th style="text-align: left;background-color:#6c757d;"><i>Catatan :</i></th>
                </tr>
                <tr>
                    <td>Pembayaran bisa di Transfer Ke rekening </td>
                </tr>
                <tr>
                    <td>Bank Mandiri</td>
                </tr>
                <tr>
                    <td>No Rek : 11 000 1740 250 1</td>
                </tr>
            </table>
        </div>
        <div class="row" style="text-align: center;margin-top:50px;">
            <p>HORMAT KAMI <br> <b>CV OSMAN JAYA MINERAL</b></p>
            <div class="box" style="height:60px">

            </div>
            <p><b><u>SAMANSYAH</u></b></p>
        </div>
    </div>
</body>
</html>

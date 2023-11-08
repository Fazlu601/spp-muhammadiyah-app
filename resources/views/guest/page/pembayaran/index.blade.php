@extends('guest.layout.main')

@section('main-content-guest')
    @php
        $siswa = Auth::guard('siswas')->user();
    @endphp
    <main class="masthead bg-light text-white text-center">
        <div class="container-fluid d-flex align-items-center flex-column">
            <div class="row w-100 p-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light">
                      <li class="breadcrumb-item"><a href="/index">Beranda</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Pembayaran SPP</li>
                    </ol>
                  </nav>
                <div class="table-responsive w-100 mx-auto">
                    <h3 class="text-dark text-left my-3">Data Tagihan SPP</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>JENIS TAGIHAN</th>
                                    <th>TANGGAL TAGIHAN</th>
                                    <th>BATAS AKHIR PEMBAYARAN</th>
                                    <th>SEMESTER</th>
                                    <th>TAHUN</th>
                                    <th>STATUS</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($data_pembayaran) == 0)
                                    <td colspan="7">Tidak Ada Data!</td>
                                @else
                                <tr>
                                    @foreach ($data_pembayaran as $items)   
                                    @php
                                      $tanggal_tagihan = \Carbon\Carbon::parse($items->tanggal_tagihan);
                                      $batas_pembayaran = \Carbon\Carbon::parse($items->batas_pembayaran);
                                      $data_pembayaran = \App\Models\DetailPembayaran::find($items->id);
                                    @endphp 
                                    <tr>
                                        <td >{{ $loop->iteration }}</td>
                                        <td>{{ $items->jenis_tagihan }}</td>
                                        <td>{{ $tanggal_tagihan->format('d F Y');}}</td>
                                        <td>{{ $batas_pembayaran->format('d F Y'); }}</td>
                                        <td>{{ $items->semester }}</td>
                                        <td>{{ $items->TahunAjaran->tahun_pelajaran}}</td>
                                        <td>
                                            @if ($data_pembayaran->status_verifikasi==='diterima')
                                                <span class="badge badge-success text-light p-2">Lunas</span>
                                                @else
                                                <span class="badge badge-danger text-light p-2">Belum Dibayar</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            @if ($data_pembayaran->status_verifikasi==='diterima')
                                            <a href="/riwayat-tagihan/cetak-nota/{{ $data_pembayaran->id }}/generate-pdf" class="btn btn-success rounded-0 m-2" style="font-size: 12px;">
                                                Cetak Kwitansi
                                            </a>
                                            @else
                                            <a href="{{ route('konfirmasi.pembayaran', [
                                                "pembayaran_id" => $items->id,
                                                "tahun_ajaran_id" => $items->TahunAjaran->id,
                                                "siswa_id" => Auth::guard('siswas')->user()->id,
                                                "prodi_id" => Auth::guard('siswas')->user()->prodi_id,
                                                "kelas_id" => Auth::guard('siswas')->user()->kelas_id]) }}" class="btn btn-primary rounded-0 m-2" style="font-size: 12px;">
                                                Konfirmasi Pembayaran
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tr>
                                @endif
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </main>
@endsection
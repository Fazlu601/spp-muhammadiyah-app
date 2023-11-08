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
                      <li class="breadcrumb-item active" aria-current="page">Riwayat Tagihan</li>
                    </ol>
                  </nav>
                <div class="table-responsive w-100 mx-auto">
                    <h3 class="text-dark text-left my-3">Data Riwayat Tagihan</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>TAGIHAN</th>
                                    <th>SEMESTER</th>
                                    <th>TAHUN AJARAN</th>
                                    <th>TANGGAL TRANSFER</th>
                                    <th>NOMINAL</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if (count($data_riwayat_pembayaran) == 0)
                                        <td colspan="7">Tidak Ada Data SPP</td>
                                    @else
                                </tr>
                                @foreach ($data_riwayat_pembayaran as $items)    
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $items->Pembayaran->jenis_tagihan }}</td>
                                            <td class="text-uppercase">{{ $items->Pembayaran->semester }}</td>
                                            <td>{{ $items->Jenis_pembayaran->TahunAjaran->tahun_pelajaran }}</td>
                                            <td>{{ $items->tanggal_transfer}}</td>
                                            <td>Rp. {{ number_format($items->jumlah_transfer) }}</td>
                                            <td>
                                                <p class="badge badge-success p-2">{{ $items->status_verifikasi }}</p>
                                            </td>
                                            <td>
                                                <a href="/riwayat-tagihan/cetak-nota/{{ $items->id }}/generate-pdf" class="btn btn-sm btn-danger text-light">
                                                  <span class="fa fa-print mr-2"></span>  CETAK KWITANSI
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </main>
@endsection
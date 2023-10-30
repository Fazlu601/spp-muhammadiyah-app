@extends('guest.layout.main')

@section('main-content-guest')
    @php
        $siswa = Auth::guard('siswas')->user();
    @endphp
    <main class="masthead bg-light text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <div class="row w-100 p-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light">
                      <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                      <li class="breadcrumb-item"><a href="/data_siswa">Data Siswa</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Riwayat Pembayaran SPP</li>
                    </ol>
                  </nav>
                <div class="table-responsive w-100 mx-auto">
                    <h3 class="text-dark text-left my-3">Data Riwayat Pembayaran SPP</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>NAMA SISWA</th>
                                    <th>TAHUN AJARAN</th>
                                    <th>PRODI</th>
                                    <th>KELAS</th>
                                    <th>NOMINAL</th>
                                    <th>DIBAYAR PADA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($data_spp) == 0)
                                    <td colspan="7">Tidak Ada Data SPP</td>
                                @else
                                <tr>
                                    @foreach ($data_spp as $items)    
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->Siswa->nama_siswa }}</td>
                                            <td>{{ $item->Jenis_pembayaran->TahunAjaran->tahun_pelajaran}}</td>
                                            <td>{{ $item->Jenis_pembayaran->Prodi->program_studi }}</td>
                                            <td>{{ $item->Jenis_pembayaran->Kelas->kelas }}</td>
                                            <td>Rp. {{ number_format($item->total_biaya) }}</td>
                                            <td>{{ $item->created_at }}</td>
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
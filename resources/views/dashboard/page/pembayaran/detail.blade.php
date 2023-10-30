@extends('dashboard.layout.main')

@section('main-content-dashboard')
        <!-- Content Row -->
        <div class="row">
            <!-- DataTales Example -->
            <div class="card shadow w-100 mb-4">
                <div class="card-header py-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="/admin/pembayaran">Pembayaran</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Detail Pembayaran</li>
                        </ol>
                      </nav>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="table-responsive mb-3 w-100">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <td>{{ $data_pembayaran->Siswa->nisn }}</td>
                                                <th>NISN</th>
                                            </tr>
                                            <tr>
                                                <th>Nama Siswa</th>
                                                <td>{{ $data_pembayaran->Siswa->nama_siswa }}</td>
                                            </tr>
                                            <tr>
                                                <th>Program Studi</th>
                                                <td>{{ $data_pembayaran->Jenis_pembayaran->Prodi->program_studi }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kelas</th>
                                                <td>{{ $data_pembayaran->Jenis_pembayaran->Kelas->kelas }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tahun Ajaran</th>
                                                <td>{{ $data_pembayaran->Jenis_pembayaran->TahunAjaran->tahun_pelajaran }}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                               <th>Nominal Pembayaran SPP</th>
                                               <td>Rp. {{ number_format($data_pembayaran->Jenis_pembayaran->nominal) }}</td>
                                            </tr>
                                            <tr>
                                               <th>Uang Dibayar</th>
                                               <td>Rp. {{ number_format($data_pembayaran->total_biaya) }}</td>
                                            </tr>
                                            <tr>
                                               <th>Status Pembayaran</th>
                                               <td>
                                                    <span class="badge badge-success p-3">Selesai</span>
                                               </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="col-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Berkas</th>
                                        <th>Berkas</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Scan Ijazah Terakhir</td>
                                        <td>
                                            @if (isset($data_siswa->Persyaratan->ijazah_terakhir))
                                            <img src="{{ asset('storage/dokumen-persyaratan' . $data_siswa->Persyaratan->ijazah_terakhir) }}" width="100" alt="Ijazah">
                                            @else
                                            <span class="badge badge-danger p-2">Belum Upload</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($data_siswa->Persyaratan->ijazah_terakhir))
                                                <a href="/storage/dokumen-persyaratan/{{ $data_siswa->Persyaratan->ijazah_terakhir }}" target="_blank" class="btn btn-primary">
                                                <span class="fa fa-eye"></span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Scan Kartu Keluarga</td>
                                        <td>
                                            @if (isset($data_siswa->Persyaratan->kartu_keluarga))
                                            <img src="{{ asset('storage/dokumen-persyaratan' . $data_siswa->Persyaratan->kartu_keluarga) }}" width="100" alt="Ijazah">
                                            @else
                                            <span class="badge badge-danger p-2">Belum Upload</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($data_siswa->Persyaratan->kartu_keluarga))
                                                <a href="/storage/dokumen-persyaratan/{{ $data_siswa->Persyaratan->kartu_keluarga }}" target="_blank" class="btn btn-primary">
                                                <span class="fa fa-eye"></span>
                                                </a>                                  
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Scan Akte Kelahiran</td>
                                        <td>
                                            @if (isset($data_siswa->Persyaratan->akte_kelahiran))
                                            <img src="{{ asset('storage/dokumen-persyaratan' . $data_siswa->Persyaratan->akte_kelahiran) }}" width="100" alt="Akte">
                                            @else
                                            <span class="badge badge-danger p-2">Belum Upload</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($data_siswa->Persyaratan->akte_kelahiran))
                                                <a href="/storage/dokumen-persyaratan/{{ $data_siswa->Persyaratan->akte_kelahiran }}" target="_blank" class="btn btn-primary">
                                                <span class="fa fa-eye"></span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div> --}}
                        </div>
                </div>
            </div> 
        </div>
       

@endsection
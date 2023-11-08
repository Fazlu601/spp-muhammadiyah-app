@extends('dashboard.layout.main')

@section('main-content-dashboard')
        <!-- Content Row -->
        <div class="row">
            <!-- DataTales Example -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light">
                  <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail Pembayaran</li>
                </ol>
              </nav>
            <div class="card shadow w-100 mb-4">
                <div class="card-header">
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="table-responsive mb-3 w-100">
                                    <table class="table" width="100%" cellspacing="0">
                                            <tr>
                                                <th>NISN</th>
                                                <td>{{ $data_pembayaran->Siswa->nisn }}</td>
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
                                    </table>
                                </div>
                                <form action="/admin/detail-pembayaran/{{ $data_pembayaran->id }}/update" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="form-group mb-3">
                                        <label for="status_verifikasi">Verifikasi Status :</label>
                                        <select name="status_verifikasi" id="status_verifikasi" required class="form-control w-50">
                                            <option value="" disabled selected>--Pilih Status--</option>
                                            <option value="diterima">Diterima</option>
                                            <option value="menunggu">Tolak</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="status_verifikasi">Tambah Keterangan :</label>
                                        <textarea name="keterangan" id="status_verifikasi" class="form-control" cols="3" rows="3">
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">SIMPAN PERUBAHAN</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6">
                                <div class="row p-3 d-block text-left">
                                        <span>Status Pembayaran :</span>
                                        @if ($data_pembayaran->status_verifikasi==='diterima')
                                            <h5 class="badge badge-success p-2 ml-2 text-uppercase">DITERIMA</h5>
                                        @else
                                            <h5 class="badge badge-danger p-2 ml-2 text-uppercase">DITOLAK</h5>
                                        @endif
                                </div>
                                <div class="row p-3 text-left">
                                    <aside class="col-6">
                                        <span>Kelas :</span>
                                        <h5 class="ml-5 mt-2 text-primary font-weight-bold text-uppercase">
                                            {{ $data_pembayaran->Jenis_pembayaran->Kelas->kelas }}
                                        </h5>
                                    </aside>
                                    <aside class="col-6">
                                        <span>Semester :</span>
                                        <h5 class="ml-5 mt-2 text-primary font-weight-bold text-uppercase">
                                            {{ $data_pembayaran->Pembayaran->semester }}
                                        </h5>
                                    </aside>
                                </div>
                                <div class="row p-3 text-left">
                                    <aside class="col-6">
                                        <span>Nominal Pembayaran :</span>
                                        <h5 class="ml-5 mt-2 text-primary font-weight-bold">
                                            Rp. {{ number_format($data_pembayaran->Jenis_pembayaran->nominal) }}
                                        </h5>
                                    </aside>
                                    <aside class="col-6">
                                        <span>Jumlah Transfer :</span>
                                        <h5 class="ml-5 mt-2 text-primary font-weight-bold">
                                            Rp. {{ number_format($data_pembayaran->Jenis_pembayaran->nominal) }}
                                        </h5>
                                    </aside>
                                </div>
                                <div class="row p-3 d-block text-left">
                                    <span>Bukti Pembayaran :</span>
                                    <a href="{{ asset('storage/bukti-pembayaran' . $data_pembayaran->bukti_pembayaran) }}" target="_blank" class="img-wrapper">
                                        <img src="{{ asset('storage/bukti-pembayaran' . $data_pembayaran->bukti_pembayaran) }}" width="300px" class="ml-5 mt-2"/>
                                    </a>
                                </div>
                                @if ($data_pembayaran->status_verifikasi==='diterima')
                                    <div class="row p-3 d-block text-left">
                                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                            class="fas fa-print fa-sm text-white-50"></i> Generate PDF</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                </div>
            </div> 
        </div>
       

@endsection
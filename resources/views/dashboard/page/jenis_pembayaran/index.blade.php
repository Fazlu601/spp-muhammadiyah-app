@extends('dashboard.layout.main')

@section('main-content-dashboard')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                class="fas fa-print fa-sm text-white-50"></i> Generate PDF</a>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- DataTales Example -->
            <div class="card shadow w-100 mb-4">
                <div class="card-header py-3">
                    <button class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">Tambah Data Baru</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th>Nominal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_jepem as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->TahunAjaran->tahun_pelajaran }}</td>
                                        <td>{{ $item->Prodi->program_studi }}</td>
                                        <td>{{ $item->Kelas->kelas }}</td>
                                        <td>Rp. {{ number_format($item->nominal )}}</td>
                                        <td class="d-flex">
                                            <a href="#" class="badge badge-primary m-2">
                                                <span class="fa fa-info text-light p-2"></span>
                                            </a>
                                            <form id="form-delete-{{ $item->id }}" method="POST" action="/admin/jenis-pembayaran/{{ $item->id }}/delete">
                                                @csrf
                                                @method('delete')
                                                <button type="button" onclick="popUp('form-delete-{{ $item->id }}')" class="badge badge-danger m-2 border-0">
                                                    <span class="fa fa-trash text-light p-2"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
        </div>



        <!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Jenis Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/admin/siswa/create" method="POST">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-3">
                    <label for="tahun_ajaran_id">*Tahun Ajaran</label>
                    <select name="tahun_ajaran_id" id="tahun_ajaran_id" class="form-control">
                        <option selected disabled value="">--Pilih--</option>
                        @foreach ( $data_tajar as $item )
                            <option value="{{ $item->id }}">{{ $item->tahun_pelajaran }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="prodi_id">*Program Studi</label>
                    <select name="prodi_id" id="prodi_id" class="form-control">
                        <option selected disabled value="">--Pilih--</option>
                        @foreach ( $data_prodi as $item )
                            <option value="{{ $item->id }}">{{ $item->program_studi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="kelas_id">*Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="form-control">
                        <option selected disabled value="">--Pilih--</option>
                        @foreach ( $data_kelas as $item )
                            <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="nama_siswa">*Nominal Biaya</label>
                    <input type="number" min="0" name="nama_siswa" id="nama_siswa" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
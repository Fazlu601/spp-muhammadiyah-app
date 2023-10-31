@extends('dashboard.layout.main')

@section('main-content-dashboard')
        <!-- Content Row -->
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
                                    <th>NO.</th>
                                    <th>JENIS TAGIHAN</th>
                                    <th>TANGGAL TAGIHAN</th>
                                    <th>BATAS AKHIR PEMBAYARAN</th>
                                    <th>SEMESTER</th>
                                    <th>TAHUN</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($data_pembayaran as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->jenis_tagihan }}</td>
                                            <td>{{ $item->tanggal_tagihan }}</td>
                                            <td>{{ $item->batas_pembayaran }}</td>
                                            <td>{{ $item->semester }}</td>
                                            <td>{{ $item->TahunAjaran->tahun_pelajaran}}</td>
                                            <td class="d-flex">
                                                <a href="/admin/pembayaran/detail/{{ $item->id }}/show" class="badge badge-primary m-2">
                                                    <span class="fa fa-info text-light p-2"></span>
                                                </a>
                                                <form id="form-delete-{{ $item->id }}" method="POST" action="/admin/pembayaran/{{ $item->id }}/delete">
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
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Tahun Ajaran Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/admin/tahun-ajaran/create" method="POST">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-3">
                    <label for="tahun_pelajaran">*Tahun ajaran baru</label>
                    <input type="text" name="tahun_pelajaran" id="tahun_pelajaran" class="form-control">
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


        {{-- <script>
            function formatRupiah(input) {
                // Menghapus karakter non-digit
                let value = input.value.replace(/\D/g, '');
                
                // Membuat format rupiah dengan pemisah ribuan
                value = Number(value).toLocaleString('id-ID');
                
                // Memasukkan format rupiah ke dalam input
                input.value = 'Rp ' + value;
            }
        </script> --}}

@endsection
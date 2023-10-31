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
                                    @foreach ($data_pembayaran as $items)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $items->jenis_tagihan }}</td>
                                            <td>{{ $items->tanggal_tagihan }}</td>
                                            <td>{{ $items->batas_pembayaran }}</td>
                                            <td>{{ $items->semester }}</td>
                                            <td>{{ $items->TahunAjaran->tahun_pelajaran}}</td>
                                            <td class="d-flex">
                                                <a href="/admin/pembayaran/detail/{{ $items->id }}/show" class="badge badge-primary m-2">
                                                    <span class="fa fa-info text-light p-2"></span>
                                                </a>
                                                <form id="form-delete" method="POST" action="/admin/pembayaran/{{ $items->id }}/delete">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" onclick="showAlert({
                                                        'title' : 'yakin ingin menghapus data berikut?',
                                                        'form' : this.form
                                                    })" class="badge badge-danger m-2 border-0">
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
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Pembayaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="/admin/pembayaran/create" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="jenis_tagihan">*Jenis Tagihan</label>
                        <select class="form-control" id="jenis_tagihan">
                            <option value="" disabled selected>--Pilih Jenis Tagihan--</option>
                            <option>Biaya SPP</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tahun_ajaran">*Tahun Ajaran</label>
                        <input type="hidden" name="tahun_ajaran_id" value="{{ $data_tahun_ajaran->id }}">
                        <input type="text" readonly value="{{ $data_tahun_ajaran->tahun_pelajaran }}"  id="tahun_ajaran_id" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tahun_ajaran">*Semester</label>
                    <div class="row px-3">
                            <div class="form-check col-3">
                                <input class="form-check-input" checked type="radio" name="semester" id="ganjil" value="ganjil">
                                <label class="form-check-label" for="ganjil">
                                    Ganjil
                                </label>
                            </div>
                    
                            <div class="form-check col-3">
                                <input class="form-check-input" type="radio" name="semester" id="genap" value="genap">
                                <label class="form-check-label" for="genap">
                                    Genap
                                </label>
                            </div>
                    </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_tagihan">*Tanggal Tagihan</label>
                        <input type="date" name="tanggal_tagihan" value="{{ date('Y-m-d') }}" class="form-control" id="tanggal_tagihan"/>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_tagihan">*Batas Pembayaran</label>
                        <input type="date" name="batas_pembayaran" min="{{ date('Y-m-d') }}" class="form-control" id="tanggal_tagihan"/>
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
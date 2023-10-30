@extends('dashboard.layout.main')

@section('main-content-dashboard')
        <!-- Content Row -->
        <div class="row">
            <!-- DataTales Example -->
            <div class="card shadow w-100 mb-4">
                <div class="card-header py-3">
                    <div class="form-group">
                        <form class="col-3 d-flex" action="/admin/pembayaran" method="get">
                            <input type="search" name="search_nisn" placeholder="Cari NISN..." class="form-control rounded-0">
                            <button type="submit" class="btn btn-dark rounded-0 ms-0">Cari</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    @if (isset($data_siswa))
                        <div class="row">
                            <div class="col-6">
                                <div class="table-responsive mb-3 w-100">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NISN</th>
                                                <td>{{ $data_siswa->nisn }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Siswa</th>
                                                <td>{{ $data_siswa->nama_siswa }}</td>
                                            </tr>
                                            <tr>
                                                <th>Program Studi</th>
                                                <td>{{ $data_siswa->Prodi->program_studi }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kelas</th>
                                                <td>{{ $data_siswa->Kelas->kelas }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tahun Ajaran</th>
                                                <td>{{ $data_siswa->TahunAjaran->tahun_pelajaran }}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                               <th>Nominal Pembayaran SPP</th>
                                               <td>Rp. {{ number_format($data_jenis_pembayaran->nominal) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-6">
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
                            </div>
                        </div>
                        <form action="/admin/pembayaran" method="post">
                            @csrf
                            <input type="hidden" name="siswa_id" value="{{ $data_siswa->id }}">
                            <input type="hidden" name="jenis_pembayaran_id" value="{{ $data_jenis_pembayaran->id }}">
                            <input type="hidden" name="tahun_ajaran_id" value="{{ $data_jenis_pembayaran->tahun_ajaran_id }}">
                            <div class="form-group mb-3 w-50 d-flex">
                                <label class="mr-3 text-danger font-weight-bold">Bayar*</label>
                                <input type="text" required id="rupiahInput" oninput="formatRupiah(this)"  name="total_biaya" class="form-control mx-2">
                                <i class="text-danger font-wight-bold">HARAP MEMBAYAR DENGAN UANG PAS!!</i>
                            </div>
                            <div class="form-group w-50">
                                <button type="button" onclick="popUp({
                                    'title' : 'Konfirmasi Pembayaran?',
                                    'formElement' : this.form,
                                    'confirmText' : 'Ya, bayar sekarang!'
                                })" class="btn btn-primary w-100">Bayar Sekarang</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div> 
        </div>
          <!-- Content Row -->
          <div class="row">
            <!-- DataTales Example -->
            <div class="card shadow w-100 mb-4">
                <div class="card-header py-3">
                 <h5>Data Pembayaran Siswa</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>NAMA SISWA</th>
                                    <th>TAHUN AJARAN</th>
                                    <th>PRODI</th>
                                    <th>KELAS</th>
                                    <th>NOMINAL</th>
                                    <th>DIBAYAR PADA</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($data_siswa))
                                    @foreach ($data_pembayaran as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->Siswa->nama_siswa }}</td>
                                            <td>{{ $item->Jenis_pembayaran->TahunAjaran->tahun_pelajaran}}</td>
                                            <td>{{ $item->Jenis_pembayaran->Prodi->program_studi }}</td>
                                            <td>{{ $item->Jenis_pembayaran->Kelas->kelas }}</td>
                                            <td>Rp. {{ number_format($item->total_biaya) }}</td>
                                            <td>{{ $item->created_at }}</td>
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
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
        </div>


        <script>
            function formatRupiah(input) {
                // Menghapus karakter non-digit
                let value = input.value.replace(/\D/g, '');
                
                // Membuat format rupiah dengan pemisah ribuan
                value = Number(value).toLocaleString('id-ID');
                
                // Memasukkan format rupiah ke dalam input
                input.value = 'Rp ' + value;
            }
        </script>

@endsection
@extends('guest.layout.main')

@section('main-content-guest')
    @php
        $siswa = Auth::guard('siswas')->user();
    @endphp
    <main class="masthead bg-light text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <a href="/data_siswa/edit/{{ $siswa->id }}" class="btn btn-primary mb-3 w-50">Ubah Data Diri</a>
            <div class="row d-flex w-100 mb-3">
                <div class="col-4">
                    <img src="{{ $siswa->foto_siswa ? asset('storage/foto-siswa/' . $siswa->foto_siswa) : asset('guest/assets/img/avataaars.svg') }}" alt="img-profile" class="img-fluid">
                </div>
                <div class="col-6 text-dark text-left">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item py-4 font-weight-bold w-100 rounded-0">NISN</li>
                        <li class="list-group-item py-4 w-100 rounded-0">{{ $siswa->nisn }}</li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item py-4 font-weight-bold w-100 rounded-0">Nama Siswa</li>
                        <li class="list-group-item py-4 w-100 rounded-0">{{ $siswa->nama_siswa}}</li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item py-4 font-weight-bold w-100 rounded-0">Program Studi</li>
                        <li class="list-group-item py-4 w-100 rounded-0">{{ $siswa->Prodi->program_studi}}</li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item py-4 font-weight-bold w-100 rounded-0">Kelas</li>
                        <li class="list-group-item py-4 w-100 rounded-0">{{ $siswa->Kelas->kelas}}</li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item py-4 font-weight-bold w-100 rounded-0">Kelas</li>
                        <li class="list-group-item py-4 w-100 rounded-0">{{ $siswa->TahunAjaran->tahun_pelajaran}}</li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="row m-0">
                <div class="table-responsive col-10 mx-auto border">
                    <h3 class="text-dark text-left my-3">Berkas Persyaratan</h3>
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
                                    @if (isset($siswa->Persyaratan->ijazah_terakhir))
                                    <img src="{{ asset('storage/dokumen-persyaratan' . $siswa->Persyaratan->ijazah_terakhir) }}" width="100" alt="Ijazah">
                                    @else
                                    Kosong
                                    @endif
                                </td>
                                <td>
                                    @if (isset($siswa->Persyaratan->ijazah_terakhir))
                                        <a href="/storage/dokumen-persyaratan/{{ $siswa->Persyaratan->ijazah_terakhir }}" target="_blank" class="btn btn-primary">
                                        Lihat 
                                        </a>
                                        <a href="/persyaratan/ijazah/{{ $siswa->Persyaratan->id }}/delete" class="btn btn-danger">Hapus</a>
                                    @else
                                    <form action="/persyaratan/ijazah/{{ $siswa->Persyaratan->id }}/update" enctype="multipart/form-data" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="file" name="ijazah_terakhir" id="ijazah" class="form-control mb-3">
                                        <button type="submit" class="btn btn-sm btn-primary w-50">Upload</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Scan Kartu Keluarga</td>
                                <td>
                                    @if (isset($siswa->Persyaratan->kartu_keluarga))
                                    <img src="{{ asset('storage/dokumen-persyaratan' . $siswa->Persyaratan->kartu_keluarga) }}" width="100" alt="Ijazah">
                                    @else
                                    Kosong
                                    @endif
                                </td>
                                <td>
                                    @if (isset($siswa->Persyaratan->kartu_keluarga))
                                        <a href="/storage/dokumen-persyaratan/{{ $siswa->Persyaratan->kartu_keluarga }}" target="_blank" class="btn btn-primary">
                                        Lihat 
                                        </a>
                                        <a href="/persyaratan/kartu-keluarga/{{ $siswa->Persyaratan->id }}/delete" class="btn btn-danger">Hapus</a>
                                    @else
                                        <form action="/persyaratan/kartu-keluarga/{{ $siswa->Persyaratan->id }}/update" enctype="multipart/form-data" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="file" name="kartu_keluarga" id="kk" class="form-control mb-3">
                                            <button type="submit" class="btn btn-sm btn-primary w-50">Upload</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Scan Akte Kelahiran</td>
                                <td>
                                    @if (isset($siswa->Persyaratan->akte_kelahiran))
                                    <img src="{{ asset('storage/dokumen-persyaratan' . $siswa->Persyaratan->akte_kelahiran) }}" width="100" alt="Akte">
                                    @else
                                    Kosong
                                    @endif
                                </td>
                                <td>
                                    @if (isset($siswa->Persyaratan->akte_kelahiran))
                                        <a href="/storage/dokumen-persyaratan/{{ $siswa->Persyaratan->akte_kelahiran }}" target="_blank" class="btn btn-primary">
                                        Lihat 
                                        </a>
                                        <a href="/persyaratan/akte-kelahiran/{{ $siswa->Persyaratan->id }}/delete" class="btn btn-danger">Hapus</a>
                                    @else
                                        <form action="/persyaratan/akte-kelahiran/{{ $siswa->Persyaratan->id }}/update" enctype="multipart/form-data" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="file" name="akte_kelahiran" id="kk" class="form-control mb-3">
                                            <button type="submit" class="btn btn-sm btn-primary w-50">Upload</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
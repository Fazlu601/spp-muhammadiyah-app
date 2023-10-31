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
                         
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
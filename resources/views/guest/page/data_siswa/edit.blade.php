@extends('guest.layout.main')

@section('main-content-guest')
    @php
        $siswa = Auth::guard('siswas')->user();
    @endphp
    <main class="masthead bg-light text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <div class="col-7 shadow-md mx-auto">
                <div class="row text-dark text-left mb-3">
                    <h5 class="fw-bold text-uppercase">Edit Data Diri</h5>
                  <form action="/data_siswa/{{ $data_siswa->id }}/update" enctype="multipart/form-data" class="w-100 p-3" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group mb-3">
                            <label>NIS</label>
                            <input type="text" value="{{ $data_siswa->nisn }}" disabled class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tahun">Tahun Ajaran</label>
                            <input type="text" value="{{ $data_siswa->TahunAjaran->tahun_pelajaran }}" disabled id="tahun" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="prodi">Prodi</label>
                            <input type="text" value="{{ $data_siswa->Prodi->program_studi }}" disabled id="prodi" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="kelas">Kelas</label>
                            <input type="text" value="{{ $data_siswa->Kelas->kelas}}" disabled id="kelas" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama_siswa" value="{{ $data_siswa->nama_siswa }}" id="nama" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ $data_siswa->tanggal_lahir }}" id="tgl_lahir" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto_siswa" id="" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmed">konfirmasi Password</label>
                            <input type="password" name="password_confirmed" id="password_confirmed" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="button" onclick="popUp({
                                'title' : 'Simpan Perubahan?',
                                'formElement' : this.form,
                                'confirmText' : 'Ya, simpan'
                            })" class="btn btn-primary w-100">Simpan Perubahan</button>
                        </div>
                  </form>
                </div>
            </div>
        </div>
    </main>
@endsection
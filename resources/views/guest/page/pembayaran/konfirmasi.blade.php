@extends('guest.layout.main')

@section('main-content-guest')
    @php
        $siswa = Auth::guard('siswas')->user();
    @endphp
    <main class="masthead bg-light text-white text-center">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light">
                  <li class="breadcrumb-item"><a href="/index">Beranda</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Konfirmasi Pembayaran</li>
                </ol>
              </nav>
            <div class="row d-flex justify-content-center">
                <div class="col-7 card border-0 rounded-0 bg-light">
                    <div class="card-body text-dark text-left mb-3">
                        <h5 class="fw-bold text-uppercase">FORM KONFIRMASI PEMBAYARAN</h5>
                      <form action="/pembayaran/konfirmasi" enctype="multipart/form-data" class="w-100 p-3" method="post">
                            @csrf
                            <input type="hidden" name="pembayaran_id" value={{ $pembayaranID }}>
                            <input type="hidden" name="siswa_id" value={{ $siswaID }}>
                            <input type="hidden" name="jenis_pembayaran_id" value={{ $data_jenis_pembayaran->id }}>
                            <div class="form-group mb-3">
                                <label for="tagihan">Tagihan</label>
                                <select id="tagihan" class="form-control">
                                    <option value="" selected disabled>--Pilih Tagihan--</option>
                                    <option value="">Biaya SPP</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="jumlah_transfer">Jumlah Yang di Transfer</label>
                                <input type="text" name="jumlah_transfer"
                                placeholder="Rp. 0" id="jumlah_transfer" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggal_transfer">Tanggal Transfer</label>
                                <input type="date" name="tanggal_transfer" value="{{ date('Y-m-d') }}" id="tanggal_transfer" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama_pemegang_rekening">Nama Pemegang Rekening</label>
                                <input type="text" name="nama_pemegang_rekening" placeholder="TUNAI" id="nama_pemegang_rekening" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" placeholder="Ketik keterangan pembayaran..." cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control border-0">
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
                <div class="col-4 card border-0 rounded-0 p-0 bg-light">
                    <div class="card-body text-dark">
                        <div class="row p-3">
                            <span>Data Diri :</span>
                            <div class="table-responsive">
                                <table cellpadding="10" class="table-bordered w-100 text-left">
                                     <tr>
                                         <th>Nama Siswa</th>
                                         <td>: {{ Auth::guard('siswas')->user()->nama_siswa }}</td>
                                     </tr>
                                     <tr>
                                         <th>Jurusan</th>
                                         <td>: {{ $data_jenis_pembayaran->Prodi->program_studi }}</td>
                                     </tr>
                                     <tr>
                                         <th>Kelas</th>
                                         <td>: {{ $data_jenis_pembayaran->Kelas->kelas }}</td>
                                     </tr>
                                     <tr>
                                         <th>Tahun Ajaran</th>
                                         <td>: {{ $data_jenis_pembayaran->TahunAjaran->tahun_pelajaran }}</td>
                                     </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row p-3 d-block text-left">
                            <span>Total Biaya :</span>
                            <h3 class="text-primary font-weight-bold">
                                Rp. {{ number_format($data_jenis_pembayaran->nominal) }}
                            </h3>
                        </div>
                        <div class="row p-3">
                            <span>Rekening :</span>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
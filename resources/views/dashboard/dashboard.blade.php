@extends('dashboard.layout.main')

@section('main-content-dashboard')
<!-- Content Row -->
<div class="row">
    <h2 class="my-3 p-3 font-weight-bold border-3 border-bottom">SISTEM INFORMASI - SUMBANGAN PEMBINAAN PENDIDIKAN</h2>
    <div class="wrapper w-100 d-flex">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow bg-primary h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-light text-uppercase mb-1">
                                Jumlah Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-light">{{ $jumlah_siswa }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x  text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-light text-uppercase mb-1">
                                Jumlah Kelas</div>
                            <div class="h5 mb-0 font-weight-bold text-light">{{ $jumlah_kelas }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x  text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Jumlah Program Studi
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 font-weight-bold text-light">{{ $jumlah_prodi }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x  text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                                Saldo Tahun Ajaran Ini</div>
                            {{-- <div class="h5 mb-0 font-weight-bold text-light">Rp. {{ number_format($jumlah_spp) }}</div> --}}
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

<!-- DataTales Example -->
        <div class="card shadow w-100 mb-4">
            <div class="card-header py-3">
                <h5 class="font-weight-bold">DATA PEMBAYARAN</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>TAGIHAN</th>
                                <th>TAHUN AJARAN</th>
                                <th>TANGGAL TRANSFER</th>
                                <th>NOMINAL</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_pembayaran as $items)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $items->Pembayaran->jenis_tagihan }}</td>
                                    <td>{{ $items->Jenis_pembayaran->TahunAjaran->tahun_pelajaran }}</td>
                                    <td>{{ $items->tanggal_transfer}}</td>
                                    <td>Rp. {{ number_format($items->jumlah_transfer) }}</td>
                                    <td>
                                    @if($items->status_verifikasi==='diterima')
                                        <span class="badge badge-success">Sudah Diterima</span>
                                    @else
                                        <span class="badge badge-danger">Belum Diterima</span>
                                    @endif
                                    </td>
                                    <td class="row d-flex" style="width: 190px">
                                        <a href="/admin/detail-pembayaran/{{ $items->id }}" class="btn btn-sm mt-2 btn-info text-light mx-2" style="height: 35px">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <form id="form-delete" method="POST" action="/admin/detail-pembayaran/{{ $items->id }}/delete">
                                            @csrf
                                            @method('delete')
                                            <button type="button"  onclick="showAlert({
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



@endsection
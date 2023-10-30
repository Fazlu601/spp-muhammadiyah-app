@extends('dashboard.layout.main')

@section('main-content-dashboard')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="card shadow w-50 mb-4">
                <div class="card-header py-3">
                    <h5>Filter Data</h5>
                </div>
                <div class="card-body">
                    <form method="GET">
                        <div class="row d-flex">
                            <aside class="label-group col-6 border py-3" style="height:80px">
                                <label for="tahun">Tahun Ajaran</label>
                            </aside>
                            <aside class="form-group col-6 border py-3" style="height:80px">
                                <select name="tahun_search" id="tahun" class="form-control rounded-0">
                                    <option value="" selected disabled>--Pilih Tahun Ajaran--</option>
                                    @foreach ( $data_tahun_ajaran as $item )
                                        <option value="{{ $item->id }}">{{ $item->tahun_pelajaran }}</option>
                                    @endforeach
                                </select>
                            </aside>
                        </div>
                        {{-- <div class="row d-flex">
                            <aside class="label-group col-6 border py-3" style="height:80px">
                                <label for="kelas">Kelas</label>
                            </aside>
                            <aside class="form-group col-6 border py-3" style="height:80px">
                                <select name="kelas_search" disabled id="kelas" class="form-control">
                                </select>
                            </aside>
                        </div> --}}
                        <div class="row">
                            <div class="form-group border px-3 py-2 w-100">
                                <button type="submit" class="btn btn-dark rounded-0 mr-3">Generate Laporan</button>
                                @if (isset($data_pembayaran))
                                    <a href="{{ route('laporan.pdf.generate', ["tahun" => request('tahun_search')]) }}" class="btn btn-danger rounded-0"><span class="fa fa-print"></span> Export PDF</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow w-100 mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Program Studi</th>
                                    <th>Kelas</th>
                                    <th>Siswa</th>
                                    <th>Total SPP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pembayaran as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Jenis_pembayaran->TahunAjaran->tahun_pelajaran }}</td>
                                        <td>{{ $item->Jenis_pembayaran->Prodi->program_studi }}</td>
                                        <td>{{ $item->Jenis_pembayaran->Kelas->kelas }}</td>
                                        <td>{{ $item->Siswa->nama_siswa }}</td>
                                        <td>Rp. {{ number_format($item->total_biaya) }}</td>
                                        <td class="d-flex">
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

@endsection
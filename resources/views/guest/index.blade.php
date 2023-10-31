@extends('guest.layout.main')

@section('main-content-guest')
    @php
        $siswa = Auth::guard('siswas')->user();
    @endphp
    <main class="masthead bg-light text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <div class="row d-flex justify-content-center">
                <div class="col-3 m-3">
                    <a href="/pembayaran" class="navigasi-info card shadow-md d-flex justify-content-end flex-column border-primary position-relative" style="border-width: 5px">
                        <div class="card-body p-3">
                            <div class="img-wrapper rounded-circle" style="height: 13rem">
                                <img src="{{ asset('guest/assets/img/pembayaran.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <p class="caption-navigasi text-light position-absolute w-100 top-50 my-auto font-weight-bold py-3 h5 bg-primary">PEMBAYARAN</p>
                    </a>
                </div>
                <div class="col-3 m-3">
                    <a href="/riwayat-tagihan/{{ Auth::guard('siswas')->user()->id }}" class="navigasi-info card shadow-md d-flex justify-content-end flex-column border-primary position-relative" style="border-width: 5px">
                        <div class="card-body p-3">
                            <div class="img-wrapper rounded-circle" style="height: 13rem">
                                <img src="{{ asset('guest/assets/img/info.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <p class="caption-navigasi text-light position-absolute w-100 top-50 my-auto font-weight-bold py-3 h5 bg-primary">RIWAYAT TAGIHAN</p>
                    </a>
                </div>
           
            </div>
        </div>
    </main>
@endsection
<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use App\Models\Jenis_pembayaran;

class JenisPembayaranController extends Controller
{
    
    public function index()
    {
        $data_jepem = Jenis_pembayaran::all();
        $data_tajar = TahunAjaran::all();
        $data_prodi = Prodi::all();
        $data_kelas = Kelas::all();

        return view('dashboard.page.jenis_pembayaran.index', [
            "title" => "Data Jenis Pembayaran SPP",
            "data_jepem" => $data_jepem,
            "data_tajar" => $data_tajar,
            "data_prodi" => $data_prodi,
            "data_kelas" => $data_kelas,
        ]);
    }

}

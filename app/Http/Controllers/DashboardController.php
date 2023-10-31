<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Prodi;
use App\Models\Siswa;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    
    public function index()
    {
        
        $jumlah_siswa = Siswa::all()->count();
        $jumlah_kelas = Kelas::all()->count();
        $jumlah_prodi = Prodi::all()->count();
        return view('dashboard.dashboard',[
            "title" => "Dashboard",
            "jumlah_siswa" => $jumlah_siswa,
            "jumlah_kelas" => $jumlah_kelas,
            "jumlah_prodi" => $jumlah_prodi,
        ]);
    }

}

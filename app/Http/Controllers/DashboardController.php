<?php

namespace App\Http\Controllers;

use App\Models\DetailPembayaran;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Prodi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    
    public function index()
    {
        
        $jumlah_siswa = Siswa::all()->count();
        $jumlah_kelas = Kelas::all()->count();
        $jumlah_prodi = Prodi::all()->count();
        $data_pembayaran = DetailPembayaran::all();
        return view('dashboard.dashboard',[
            "title" => "Dashboard",
            "jumlah_siswa" => $jumlah_siswa,
            "jumlah_kelas" => $jumlah_kelas,
            "jumlah_prodi" => $jumlah_prodi,
            "data_pembayaran" => $data_pembayaran
        ]);
    }

    public function detailPembayaran($id)
    {
        $data_pembayaran = DetailPembayaran::where('id', $id)->first();
        return view('dashboard.page.pembayaran.detail', [
            "data_pembayaran" => $data_pembayaran
        ]);
    }

    public function updatePembayaran(Request $request, $id)
    {
        $data['status_verifikasi'] = $request->post('status_verifikasi');
        if($request->post('keterangan')){
            $data['keterangan'] = $request->post('keterangan');
        }
        DetailPembayaran::where('id', $id)
                        ->update($data);
        return back()->with('success', 'Pembayaran Berhasil Diverifikasi');
    }

}

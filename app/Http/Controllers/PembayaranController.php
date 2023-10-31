<?php

namespace App\Http\Controllers;

use App\Models\Jenis_pembayaran;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    
    public function index(Request $request)
    {
        if($request->get('search_nisn')){
            $nisn = $request->get('search_nisn');
            $data_siswa = Siswa::where('nisn', $nisn)->first();
            $data_jenis_pembayaran = Jenis_pembayaran::where('tahun_ajaran_id', $data_siswa->tahun_ajaran_id)->where('prodi_id', $data_siswa->prodi_id)
                                         ->where('kelas_id', $data_siswa->kelas_id)->first();

            $data_pembayaran = Pembayaran::where('siswa_id', $data_siswa->id)->get();
            return view('dashboard.page.pembayaran.index', [
                "title" => "Pembayaran",
                "data_siswa" => $data_siswa,
                "data_jenis_pembayaran" => $data_jenis_pembayaran,
                "data_pembayaran" => $data_pembayaran
            ]);
        }else {
            $data_pembayaran = Pembayaran::all();
            return view('dashboard.page.pembayaran.index', [
                "title" => "Pembayaran",
                "data_pembayaran" => $data_pembayaran
            ]);
        }
    }

    public function store(Request $request)
    {   
        $validateData = $request->validate([
            "siswa_id" => "required",
            "jenis_pembayaran_id" => "required",
            "tahun_ajaran_id" => "required",
            "total_biaya" => "required",
        ]);
         // Mendapatkan nilai dari input
        $rupiahValue = $validateData['total_biaya'];

        // Menghapus format rupiah dan karakter non-digit
        $cleanedValue = preg_replace("/[^0-9]/", "", $rupiahValue);

        // Mengubah nilai ke tipe data angka (integer atau float), sesuaikan dengan kebutuhan Anda
        $numericValue = (int) $cleanedValue;
        $validateData['total_biaya'] = $numericValue;

        $validateData['already_pay'] = 1;

        $pembayaranID = Pembayaran::create($validateData)->id;
        return redirect('/admin/pembayaran/detail/' . $pembayaranID . '/show')->with("success", "Pembayaran Berhasil!");
    }

    public function show($id)
    {
        $data_pembayaran = Pembayaran::where('id', $id)->first();
        return view('dashboard.page.pembayaran.detail', [
            "data_pembayaran" => $data_pembayaran
        ]);
    }

}

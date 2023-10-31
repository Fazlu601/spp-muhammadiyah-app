<?php

namespace App\Http\Controllers;

use App\Models\Jenis_pembayaran;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\TahunAjaran;
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
            $data_tahun_ajaran = TahunAjaran::where('status_aktif', 1)->first();
            return view('dashboard.page.pembayaran.index', [
                "title" => "Pembayaran",
                "data_pembayaran" => $data_pembayaran,
                "data_tahun_ajaran" => $data_tahun_ajaran
            ]);
        }
    }

    public function store(Request $request)
    {   
        $validateData = $request->validate([
            "tahun_ajaran_id" => "required",
            "semester" => "required",
            "tanggal_tagihan" => "required",
            "batas_pembayaran" => "required"
        ]);
        Pembayaran::create($validateData);
        return back()->with("success", "Pembayaran Berhasil!");
    }

    public function show($id)
    {
        $data_pembayaran = Pembayaran::where('id', $id)->first();
        return view('dashboard.page.pembayaran.detail', [
            "data_pembayaran" => $data_pembayaran
        ]);
    }

    public function destroy($id)
    {
        Pembayaran::destroy($id);
        return back()->with("success", "Data Berhasil Dihapus!");
    }

}

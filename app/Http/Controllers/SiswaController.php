<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Prodi;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function dataSiswa()
    {
        return view('guest.page.data_siswa.index');
    }
    
    public function index()
    {
        $data_siswa = Siswa::all();
        $data_tajar = TahunAjaran::all();
        $data_prodi = Prodi::all();
        $data_kelas = Kelas::all();

        return view('dashboard.page.siswa.index', [
            "title" => "Data Siswa Pendaftar",
            "data_siswa" => $data_siswa,
            "data_tajar" => $data_tajar,
            "data_prodi" => $data_prodi,
            "data_kelas" => $data_kelas,
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            "nisn" => "required",
            "nama_siswa" => "required",
            "tahun_ajaran_id" => "required",
            "prodi_id" => "required",
            "kelas_id" => "required",
            "tanggal_lahir" => "required",
        ]);

        Siswa::create($validateData);
        return back()->with('success', "Data Baru Berhasil Ditambahkan!");

    }

}

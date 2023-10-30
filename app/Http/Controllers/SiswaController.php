<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Persyaratan;
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

        $siswaID = Siswa::create($validateData)->id;
        Persyaratan::create(["siswa_id" => $siswaID]);
        return back()->with('success', "Data Baru Berhasil Ditambahkan!");

    }

    public function editDataSiswa($id)
    {
        $data_siswa = Siswa::where('id', $id)->first();
        return view('guest.page.data_siswa.edit', [
            "data_siswa" => $data_siswa
        ]);
    }
    public function updateDataSiswa(Request $request, $id)
    {
        $validateData = $request->validate([
            "nama_siswa" => "required",
            "tanggal_lahir" => "required",
            "foto_siswa" => "image|mimes:jpeg,jpg"
        ]);

        if($validateData['foto_siswa']){
            $path = $validateData['foto_siswa']->store('public/foto-siswa');
            $validateData['foto_siswa'] = str_replace('public/foto-siswa', '', $path);
        }
        if($request->post('password') === $request->post('password_confirmation')){
            $validateData['password'] = Hash::make($request->post('password'));
        }

        Siswa::where('id', $id)
                ->update($validateData);
        return redirect('/data_siswa')->with('success', 'Data Berhasil Diperbaharui');
    }

    public function dataSPP($id)
    {
        $data_spp = Pembayaran::where('siswa_id', $id)->get();
        return view('guest.page.data_spp.index', [
            "data_spp" => $data_spp
        ]);
    }

}

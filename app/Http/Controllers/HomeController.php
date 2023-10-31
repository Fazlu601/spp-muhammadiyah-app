<?php

namespace App\Http\Controllers;

use App\Models\DetailPembayaran;
use App\Models\Jenis_pembayaran;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('guest.index');
    }
    
    public function profile($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        return view('guest.page.data_siswa.profile', ["data_siswa" => $siswa]);
    }

    public function editProfileSiswa($id)
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

    public function pembayaran()
    {
        $data_pembayaran = Pembayaran::all();
        return view('guest.page.pembayaran.index', [
            "data_pembayaran" => $data_pembayaran
        ]);
    }

    public function konfirmasiPembayaran(Request $request)
    {
        $pembayaranID = $request->get('pembayaran_id');
        $tahunAjaranID = $request->get('tahun_ajaran_id');
        $siswaID = $request->get('siswa_id');
        $prodiID = $request->get('prodi_id');
        $kelasID = $request->get('kelas_id');

        $data_jenis_pembayaran = Jenis_pembayaran::where('tahun_ajaran_id', $tahunAjaranID)->where('prodi_id', $prodiID)
        ->where('kelas_id', $kelasID)->first();

        return view('guest.page.pembayaran.konfirmasi', [
            "pembayaranID" => $pembayaranID,
            "siswaID" => $siswaID,
            "data_jenis_pembayaran" => $data_jenis_pembayaran
        ]);
    }

    public function storePembayaran(Request $request)
    {
        $validateData = $request->validate([
            "pembayaran_id" => "required",
            "siswa_id" => "required",
            "jenis_pembayaran_id" => "required",
            "jumlah_transfer" => "required",
            "tanggal_transfer" => "required",
            "nama_pemegang_rekening" => "required",
            "bukti_pembayaran" => "image|max:1024"
        ]);

        if($validateData['bukti_pembayaran']) {
            $path = $validateData['bukti_pembayaran']->store('public/bukti-pembayaran');
            $validateData['bukti_pembayaran'] = str_replace('public/bukti-pembayaran', '', $path);
        }

        if($request->post('keterangan')){
            $validateData['keterangan'] = $request->post('keterangan');
        }

        $id = DetailPembayaran::create($validateData)->id;

        return redirect('detail/pembayaran/' . $id)->with("success", "Data Pembayaran Berhasil Terkirim!");
    }

    public function riwayatPembayaran($id)
    {
        $data_pembayaran = DetailPembayaran::where('siswa_id', $id)->get();
        return view('guest.page.riwayat_tagihan.index', [
            "data_riwayat_pembayaran" => $data_pembayaran
        ]);  
    }

}

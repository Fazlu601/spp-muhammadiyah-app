<?php

namespace App\Http\Controllers;

use App\Models\Persyaratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersyaratanController extends Controller
{
    
    
    public function uploadIjazah(Request $request, $id)
    {
        $validateData = $request->validate([
                            'ijazah_terakhir' => 'required|image|mimes:jpeg,jpg|max:1024',
                        ], [
                            'ijazah_terakhir.required' => 'Anda harus memilih file gambar.',
                            'ijazah_terakhir.image' => 'File yang Anda pilih bukan gambar.',
                            'ijazah_terakhir.mimes' => 'File harus berformat JPEG (jpg).',
                            'ijazah_terakhir.max' => 'Ukuran file tidak boleh lebih dari 1MB.',
                        ]);
        if($validateData){
            $path = $validateData['ijazah_terakhir']->store('public/dokumen-persyaratan');
            $validateData['ijazah_terakhir'] = str_replace('public/dokumen-persyaratan', '', $path);
        }
        Persyaratan::where('id', $id)
                    ->update(["ijazah_terakhir" => $validateData['ijazah_terakhir']]);
        return back()->with("success", "Dokumen Berhasil Diupload!");
    }

    public function uploadKK(Request $request, $id)
    {
        $validateData = $request->validate([
                            'kartu_keluarga' => 'required|image|mimes:jpeg,jpg|max:1024',
                        ], [
                            'kartu_keluarga.required' => 'Anda harus memilih file gambar.',
                            'kartu_keluarga.image' => 'File yang Anda pilih bukan gambar.',
                            'kartu_keluarga.mimes' => 'File harus berformat JPEG (jpg).',
                            'kartu_keluarga.max' => 'Ukuran file tidak boleh lebih dari 1MB.',
                        ]);
        if($validateData){
            $path = $validateData['kartu_keluarga']->store('public/dokumen-persyaratan');
            $validateData['kartu_keluarga'] = str_replace('public/dokumen-persyaratan', '', $path);
        }
        Persyaratan::where('id', $id)
                    ->update(["kartu_keluarga" => $validateData['kartu_keluarga']]);
        return back()->with("success", "Dokumen Berhasil Diupload!");
    }

    public function uploadAkte(Request $request, $id)
    {
        $validateData = $request->validate([
                            'akte_kelahiran' => 'required|image|mimes:jpeg,jpg|max:1024',
                        ], [
                            'akte_kelahiran.required' => 'Anda harus memilih file gambar.',
                            'akte_kelahiran.image' => 'File yang Anda pilih bukan gambar.',
                            'akte_kelahiran.mimes' => 'File harus berformat JPEG (jpg).',
                            'akte_kelahiran.max' => 'Ukuran file tidak boleh lebih dari 1MB.',
                        ]);
        if($validateData){
            $path = $validateData['akte_kelahiran']->store('public/dokumen-persyaratan');
            $validateData['akte_kelahiran'] = str_replace('public/dokumen-persyaratan', '', $path);
        }
        Persyaratan::where('id', $id)
                    ->update(["akte_kelahiran" => $validateData['akte_kelahiran']]);
        return back()->with("success", "Dokumen Berhasil Diupload!");
    }

    public function deleteIjazah($id)
    {
        $get_path = Persyaratan::where('id', $id)->first()->ijazah_terakhir;
    
        if(Storage::disk('public')->exists('dokumen-persyaratan' . $get_path)){
            Storage::disk('public')->delete('dokumen-persyaratan' . $get_path);
        }
        Persyaratan::where('id', $id)
                    ->update(["ijazah_terakhir" => null]);
        return back()->with("success", "Dokumen Berhasil Dhapus!");
    }

    public function deleteKK($id)
    {
        $get_path = Persyaratan::where('id', $id)->first()->kartu_keluarga;
    
        if(Storage::disk('public')->exists('dokumen-persyaratan' . $get_path)){
            Storage::disk('public')->delete('dokumen-persyaratan' . $get_path);
        }

        Persyaratan::where('id', $id)
                    ->update(["kartu_keluarga" => null]);
        return back()->with("success", "Dokumen Berhasil Dhapus!");
    }

    public function deleteAkte($id)
    {
        $get_path = Persyaratan::where('id', $id)->first()->akte_kelahiran;
    
        if(Storage::disk('public')->exists('dokumen-persyaratan' . $get_path)){
            Storage::disk('public')->delete('dokumen-persyaratan' . $get_path);
        }

        Persyaratan::where('id', $id)
                    ->update(["akte_kelahiran" => null]);
        return back()->with("success", "Dokumen Berhasil Dhapus!");
    }
}

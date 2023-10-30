<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    
    public function index()
    {
        $data = TahunAjaran::all();
        return view('dashboard.page.tahun_ajaran.index', [
            "title" => "Data Tahun Pelajaran",
            "data" => $data
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(["tahun_pelajaran" => "required|min:9|max:9"]);
        TahunAjaran::create($validateData);
        return back()->with('success', 'Berhasil Menambahkan Data Baru!');
    }

}

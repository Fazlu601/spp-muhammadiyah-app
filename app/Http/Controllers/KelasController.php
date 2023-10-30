<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    
    public function index()
    {
        $data = Kelas::all();
        return view('dashboard.page.kelas.index', [
            "title" => "Data Kelas",
            "data" => $data
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(["kelas" => "required|min:1|max:2"]);
        Kelas::create($validateData);
        return back()->with('success', 'Berhasil Menambahkan Data Baru!');
    }


}

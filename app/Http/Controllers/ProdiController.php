<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    
    public function index()
    {
        $data = Prodi::all();
        return view('dashboard.page.program_studi.index', [
            "title" => "Data Program Studi",
            "data" => $data
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(["program_studi" => "required|min:3|max:10"]);
        Prodi::create($validateData);
        return back()->with('success', 'Berhasil Menambahkan Data Baru!');
    }


}

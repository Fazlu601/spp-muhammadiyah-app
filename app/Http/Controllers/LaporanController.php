<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class LaporanController extends Controller
{
    
    public function index(Request $request)
    {
        if($request->get('tahun_search')){
            $tahunSearch = $request->get('tahun_search');
            $pembayaran = Pembayaran::where('tahun_ajaran_id', $tahunSearch)->get();
            $tahunAjaran = TahunAjaran::all();
    
            return view('dashboard.page.laporan.index', [
                "title" => "laporan",
                "data_pembayaran" => $pembayaran,
                "data_tahun_ajaran" => $tahunAjaran
            ]);
        }else {
            $pembayaranAll = Pembayaran::all();
            $tahunAjaran = TahunAjaran::all();
    
            return view('dashboard.page.laporan.index', [
                "title" => "laporan",
                "data_pembayaran" => $pembayaranAll,
                "data_tahun_ajaran" => $tahunAjaran
            ]);
        }
            
        
    }

    public function generatePDF(Request $request)
    {
        $tahun_ajaran = $request->get('tahun');
        $pembayaran = Pembayaran::where('tahun_ajaran_id', $tahun_ajaran)->get();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('dashboard.page.laporan.pdf', ['data' => $pembayaran]);
        return $pdf->stream();
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPembayaran;
use Illuminate\Support\Facades\Config;
use Riskihajar\Terbilang\Facades\Terbilang;

class DetailPembayaranController extends Controller
{
    
    public function generatePDF($id)
    {
        $data_pembayaran = DetailPembayaran::find($id);
        Config::set('terbilang.locale', 'id');
        $nominal_word_convert = Terbilang::make($data_pembayaran->jumlah_transfer);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('guest.page.kwitansi.index', [
            'data' => $data_pembayaran, 
            'total_dibayar' => $nominal_word_convert ]);
        return $pdf->stream();
    }

}

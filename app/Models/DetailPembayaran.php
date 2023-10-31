<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'pembayaran_id', 'id');
    }

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
    
    public function Jenis_pembayaran()
    {
        return $this->belongsTo(Jenis_pembayaran::class, 'jenis_pembayaran_id', 'id');
    }
}

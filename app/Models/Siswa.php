<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;

    protected $guarded = ['id'];

    public function TahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id', 'id');
    }

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function Pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }


}

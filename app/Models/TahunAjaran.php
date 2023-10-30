<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function Jenis_pembayaran()
    {
        return $this->hasMany(Jenis_pembayaran::class);
    }

    public function Pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

}

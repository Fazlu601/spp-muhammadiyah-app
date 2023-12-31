<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

}

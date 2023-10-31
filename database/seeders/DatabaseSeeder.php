<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jenis_pembayaran;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Persyaratan;
use App\Models\Prodi;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            "name" => "admin",
            "username" => "admin01",
            "email" => "admin@gmail.com",
            "password" => Hash::make('admin')
        ]);

        TahunAjaran::create([
            "tahun_pelajaran" => "2023/2024",
        ]);
        Prodi::create([
           "program_studi" => "IPA"
        ]);
        Prodi::create([
            "program_studi" => "IPS"
        ]);
        Kelas::create([
            "kelas" => "X"
        ]);

        Jenis_pembayaran::create([
            "tahun_ajaran_id" => 1,
            "prodi_id" => 1,
            "kelas_id" => 1,
            "nominal" => 400000
        ]);

        Siswa::create([
            "nisn" => "10001",
            "nama_siswa" => "Fazlu Rachman",
            "tahun_ajaran_id" => 1,
            "prodi_id" => 1,
            "kelas_id" => 1,
            "tanggal_lahir" => "2001-11-06",
            "password" => Hash::make('061101')
        ]);

        Siswa::create([
            "nisn" => "10002",
            "nama_siswa" => "Rudi Cahyono",
            "tahun_ajaran_id" => 1,
            "prodi_id" => 1,
            "kelas_id" => 1,
            "tanggal_lahir" => "2001-12-08",
            "password" => Hash::make('081201')
        ]);

        Siswa::create([
            "nisn" => "10003",
            "nama_siswa" => "Wak Okto",
            "tahun_ajaran_id" => 1,
            "prodi_id" => 1,
            "kelas_id" => 1,
            "tanggal_lahir" => "2000-10-10",
            "password" => Hash::make('101000')
        ]);

        Siswa::create([
            "nisn" => "10004",
            "nama_siswa" => "Angel",
            "tahun_ajaran_id" => 1,
            "prodi_id" => 1,
            "kelas_id" => 1,
            "tanggal_lahir" => "2000-09-23",
            "password" => Hash::make('230900')
        ]);

        Pembayaran::create([
            "tahun_ajaran_id" => 1,
            "semester" => "genap",
            "tanggal_tagihan" => "2023-10-31",
            "batas_pembayaran" => "2023-11-25"
        ]);
        
    }
}

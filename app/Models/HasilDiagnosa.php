<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilDiagnosa extends Model
{
    use HasFactory;
    protected $table = 'hasil_diagnosas';
    protected $fillable = ['nama_pasien', 'umur', 'jenis_kelamin', 'no_telp', 'alamat', 'Kode_Penyakit'];
}

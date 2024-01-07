<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $table = 'penyakits';
    protected $fillable = ['Kode_Penyakit', 'Gambar_Penyakit', 'Nama_Penyakit', 'Deskripsi_Penyakit'];

    // Assuming you have a pivot table named penyakit_gejala
    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'penyakit_gejala', 'penyakit_id', 'gejala_id');
    }

    public function aturans()
    {
        return $this->belongsToMany(Aturan::class, 'aturans', 'Kode_Penyakit', 'Kode_Gejala');
    }
}

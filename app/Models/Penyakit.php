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
        return $this->hasMany(Gejala::class, 'Kode_Penyakit', 'Kode_Penyakit');
    }

    public function aturan()
    {
        return $this->belongsTo(Aturan::class, 'aturan_id', 'id');
    }
}

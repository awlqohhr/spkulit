<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    use HasFactory;

    protected $fillable = [
        'Kode_Gejala',
        'Kode_Penyakit',
        // Tambahkan atribut lain sesuai kebutuhan
    ];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'Kode_Gejala', 'Kode_Gejala');
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'Kode_Penyakit', 'Kode_Penyakit');
    }
}

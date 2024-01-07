<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    use HasFactory;

    protected $table = 'aturans';
    protected $primaryKey = 'id'; // Sesuaikan dengan nama kolom primary key yang sesuai
    public $timestamps = false; // Sesuaikan jika Anda tidak menggunakan kolom created_at dan updated_at

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

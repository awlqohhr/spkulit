<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pasien',
        'alamat_pasien',
        'Kode_Penyakit',
        // tambahkan field lain yang diperlukan
    ];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }
}

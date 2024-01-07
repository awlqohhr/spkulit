<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $table = 'gejalas';
    protected $fillable = ['Kode_Gejala', 'Nama_Gejala'];

    // Assuming 'kode_penyakit' is the foreign key in Gejala table
    public function penyakits()
    {
        return $this->belongsToMany(Penyakit::class, 'penyakit_gejala', 'gejala_id', 'penyakit_id');
    }
}

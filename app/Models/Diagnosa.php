<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'umur', 'jenis_kelamin', 'no_telp', 'alamat'];

    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'diagnosa_gejala', 'diagnosa_id', 'gejala_id');
    }
}

<?php

// app/Models/Penyakit.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $table = 'penyakits';
    protected $fillable = ['kode_penyakit', 'gambar', 'nama_penyakit'];
}
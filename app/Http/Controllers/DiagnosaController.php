<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Aturan;
use App\Models\Penyakit;
use App\Models\HasilDiagnosa;

class DiagnosaController extends Controller
{
    public function showForm()
    {
        $gejalas = Gejala::all();
        return view('user.diagnosa.index', compact('gejalas'));
    }

    public function processDiagnosa(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'umur' => 'required|integer',
            'jenis_kelamin' => 'required|string',
            'no_telp' => 'nullable|string',
            'alamat' => 'required|string',
            'Kode_Gejala' => 'required|array',
        ]);

        $gejalaCodes = $request->input('Kode_Gejala');
        $gejalas = Gejala::whereIn('Kode_Gejala', $gejalaCodes)->get();

        // Menambahkan logika untuk memproses gejala yang dipilih dan menentukan diagnosa
        $kodePenyakit = $this->diagnosa($gejalas);

        // Store diagnosis data in the database
        $diagnosa = Diagnosa::create($request->all());
        $diagnosa->update(['kode_penyakit' => $kodePenyakit]);

        // Menyimpan hasil diagnosa ke dalam database
        $hasilDiagnosa = new HasilDiagnosa();
        $hasilDiagnosa->nama_pasien = $diagnosa->nama;
        $hasilDiagnosa->umur = $diagnosa->umur;
        $hasilDiagnosa->jenis_kelamin = $diagnosa->jenis_kelamin;
        $hasilDiagnosa->no_telp = $diagnosa->no_telp;
        $hasilDiagnosa->alamat = $diagnosa->alamat;
        $hasilDiagnosa->kode_penyakit = $diagnosa->kode_penyakit;
        $hasilDiagnosa->save();

        return redirect()->route('show.diagnosa')->with('success', 'Diagnosa berhasil dilakukan.');
    }

    private function diagnosa($gejalas)
    {
        $gejalaCodes = $gejalas->pluck('Kode_Gejala');

        // Mendapatkan aturan berdasarkan gejala yang dipilih
        $aturans = Aturan::whereIn('Kode_Gejala', $gejalaCodes)->get();

        // Menghitung jumlah kemunculan setiap penyakit
        $penyakitCounts = $aturans->groupBy('kode_penyakit')->map->count();

        // Menentukan penyakit yang paling sering muncul
        $mostFrequentPenyakit = $penyakitCounts->sortDesc()->keys()->first();

        return $mostFrequentPenyakit;
    }
}

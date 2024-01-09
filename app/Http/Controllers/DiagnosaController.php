<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\HasilDiagnosa;
use App\Http\Controllers\AturanController;


class DiagnosaController extends Controller
{
    protected $aturanController;

    public function __construct(AturanController $aturanController)
    {
        $this->aturanController = $aturanController;
    }

    public function showForm()
    {
        $gejalas = Gejala::all();
        return view('user.diagnosa.index', compact('gejalas'));
    }

    public function processForm(Request $request)
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

        // Panggil metode diagnosa untuk mendapatkan kode penyakit
        $kodePenyakit = $this->diagnosa($gejalas);

        // Store diagnosis data in the database
        $diagnosa = Diagnosa::create($request->all());
        $diagnosa->update(['Kode_Penyakit' => $kodePenyakit]);

        // Menyimpan hasil diagnosa ke dalam database
        $hasilDiagnosa = new HasilDiagnosa();

        $hasilDiagnosa->nama = $diagnosa->nama;
        $hasilDiagnosa->umur = $diagnosa->umur;
        $hasilDiagnosa->jenis_kelamin = $diagnosa->jenis_kelamin;
        $hasilDiagnosa->no_telp = $diagnosa->no_telp;
        $hasilDiagnosa->alamat = $diagnosa->alamat;

        // Pastikan Kode_Penyakit memiliki nilai sebelum menyimpan
        $hasilDiagnosa->Kode_Penyakit = $kodePenyakit;

        $hasilDiagnosa->save();

        // Panggil metode forwardChaining untuk mendapatkan hasil inferensi
        $this->aturanController->forwardChaining($gejalaCodes);


        // Redirect ke halaman hasil diagnosa dengan ID hasil diagnosa
        return redirect()->route('hasil.diagnosa', ['id' => $hasilDiagnosa->id])->with('success', 'Diagnosa berhasil dilakukan.');
    }

    private function diagnosa($gejalas)
    {
        // Ambil Kode_Gejala dari gejala yang dipilih
        $gejalaCodes = $gejalas->pluck('Kode_Gejala')->toArray();

        // Inisialisasi array untuk menyimpan fakta
        $fakta = [];

        // Iterasi gejalaCodes untuk menentukan nilai fakta
        foreach ($gejalaCodes as $gejalaCode) {
            $fakta[$gejalaCode] = true;
        }

        // Inisialisasi array untuk menyimpan hasil dari inferensi
        $hasilInferensi = "";

        // Ambil semua aturan berdasarkan gejala yang dipilih
        $aturans = $this->aturanController->getAturanByGejalaCodes($gejalaCodes);

        // Iterasi setiap aturan untuk melakukan inferensi
        foreach ($aturans as $aturan) {
            $inferensiResult = $this->checkFakta($aturan->gejalaRule, $fakta);

            if ($inferensiResult) {
                $hasilInferensi = $aturan->Kode_Penyakit;
            }
        }

        if (isset($aturan)) {
            $hasilInferensi = $aturan->Kode_Penyakit;
        } else {
            $hasilInferensi = "Tidak ditemukan";
        }

        // Kembalikan array penyakit dengan prioritas tertinggi (berdasarkan aturan)
        return $hasilInferensi;
    }

    private function checkFakta($gejalaRule, $fakta)
    {
        // Check if $gejalaRule is an array
        if (!is_array($gejalaRule)) {
            return false;
        }

        // Check apakah semua gejala aturan terpenuhi
        foreach ($gejalaRule as $gejalaCode) {
            if (!isset($fakta[$gejalaCode]) || !$fakta[$gejalaCode]) {
                return false;
            }
        }

        return true;
    }


    public function showHasilDiagnosa($id)
    {
        // Mengambil hasil diagnosa berdasarkan ID
        $diagnosa = HasilDiagnosa::findOrFail($id);

        // Memeriksa apakah hasil diagnosa berupa array
        if (is_array($diagnosa->hasil)) {
            // Jika ya, ambil kode penyakit dengan prioritas tertinggi
            $kodePenyakit = reset($diagnosa->hasil);
        } else {
            // Jika tidak, tetapkan nilai 'Tidak diketahui'
            $kodePenyakit = 'Tidak diketahui';
        }

        // Mengirim kode penyakit ke view
        return view('user.diagnosa.hasil', compact('diagnosa', 'kodePenyakit'));
    }
}

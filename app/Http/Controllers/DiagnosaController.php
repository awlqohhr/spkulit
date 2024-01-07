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
        $hasilDiagnosa->Kode_Penyakit = $diagnosa->Kode_Penyakit ?? 'Tidak diketahui';

        $hasilDiagnosa->save();

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
        $hasilInferensi = [];

        // Ambil semua aturan berdasarkan gejala yang dipilih
        $aturans = $this->aturanController->getAturanByGejalaCodes($gejalaCodes);

        // Iterasi setiap aturan untuk melakukan inferensi
        foreach ($aturans as $aturan) {
            $gejalaRule = $aturan->gejala;

            // Check apakah semua gejala aturan terpenuhi
            if ($this->checkFakta($gejalaRule, $fakta)) {
                $hasilInferensi[$aturan->Kode_Penyakit] = true;
            }
        }

        // Ambil Penyakit yang memiliki hasil inferensi
        $penyakitCodes = array_keys($hasilInferensi);

        // Jika tidak ada hasil inferensi, kembalikan 'Tidak diketahui'
        if (empty($penyakitCodes)) {
            return 'Tidak diketahui';
        }

        // Kembalikan penyakit dengan prioritas tertinggi (berdasarkan aturan)
        return $penyakitCodes[0];
    }

    private function checkFakta($gejalaRule, $fakta)
    {
        // Check apakah semua gejala aturan terpenuhi
        foreach ($gejalaRule as $gejala) {
            if (!isset($fakta[$gejala]) || !$fakta[$gejala]) {
                return false;
            }
        }

        return true;
    }

    public function showHasilDiagnosa($id)
    {
        $diagnosa = HasilDiagnosa::findOrFail($id);
        return view('user.diagnosa.hasil', compact('diagnosa'));
    }
}

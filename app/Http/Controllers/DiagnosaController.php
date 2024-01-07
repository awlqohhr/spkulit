<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Diagnosa;
use App\Models\HasilDiagnosa;

class DiagnosaController extends Controller
{
    public function showForm()
    {
        // Ambil gejala dari database (menggunakan model Gejala)
        $gejalas = Gejala::all();

        return view('user.diagnosa.index', compact('gejalas'));
    }

    public function processForm(Request $request)
    {
        // Validasi data formulir
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_telp' => 'nullable|numeric',
            'alamat' => 'required|string|max:255',
            'Kode_Gejala' => 'required|array',
            'Kode_Gejala.*' => 'exists:gejalas,Kode_Gejala',
        ]);

        // Simpan data ke dalam database (gunakan model Diagnosa)
        $diagnosa = Diagnosa::create($validatedData);

        // Hubungkan gejala dengan diagnosa
        $diagnosa->gejalas()->attach($validatedData['Kode_Gejala']);

        // Implementasikan logika diagnosa berdasarkan aturan
        $penyakit = $this->diagnose($diagnosa);

        return redirect()->route('user.diagnosa.hasil', ['diagnosa' => $diagnosa->id, 'penyakit' => $penyakit]);
    }

    private function diagnose(Diagnosa $diagnosa)
    {
        // Ambil gejala dari diagnosa
        $gejalas = $diagnosa->gejalas()->pluck('Kode_Gejala')->toArray();

        // Ambil semua aturan dari database (gunakan model Aturan)
        $aturans = Aturan::all();

        // Inisialisasi array untuk menyimpan penyakit yang mungkin
        $penyakitMungkin = [];

        // Iterasi aturan dan cek apakah gejala terpenuhi
        foreach ($aturans as $aturan) {
            $gejalaAturan = $aturan->gejala;

            // Jika semua gejala aturan terpenuhi, tambahkan penyakit ke array
            if (count(array_intersect($gejalas, $gejalaAturan)) === count($gejalaAturan)) {
                $penyakitMungkin[] = $aturan->penyakit;
            }
        }

        // Jika ada penyakit yang mungkin, ambil yang pertama
        if (!empty($penyakitMungkin)) {
            $penyakit = $penyakitMungkin[0];
        } else {
            // Jika tidak ada penyakit yang cocok, berikan nilai default
            $penyakit = 'Tidak Diketahui';
        }

        return  $penyakitMungkin;
    }

    public function showResult(Diagnosa $diagnosa)
    {
        // Ambil hasil diagnosa dari database atau sesuai logika yang Anda terapkan
        $hasilDiagnosa = $this->getDiagnosaResult($diagnosa);

        return view('user.diagnosa.hasil', compact('diagnosa', 'hasilDiagnosa'));
    }

    private function getDiagnosaResult(Diagnosa $diagnosa)
    {
        // Check if there is an existing result for this diagnosa
        $hasilDiagnosa = HasilDiagnosa::where('diagnosa_id', $diagnosa->id)->first();

        if ($hasilDiagnosa) {
            // If result exists, return it
            return $hasilDiagnosa->hasil;
        } else {
            // If result doesn't exist, implement your custom logic to calculate the result
            // For now, let's assume a simple message
            $hasilDiagnosaMessage = 'Diagnosa berhasil dilakukan, hasil belum tersedia.';

            // Save the result to the database
            HasilDiagnosa::create([
                'diagnosa_id' => $diagnosa->id,
                'hasil' => $hasilDiagnosaMessage,
            ]);

            return $hasilDiagnosaMessage;
        }
    }
}

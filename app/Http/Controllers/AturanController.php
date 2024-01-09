<?php

namespace App\Http\Controllers;

use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;


class AturanController extends Controller
{
    public function index()
    {
        $data = Aturan::all();
        $gejalas = Gejala::all();
        $penyakits = Penyakit::all();

        return view('admin.aturan.index', compact('data', 'gejalas', 'penyakits'));
    }

    public function create()
    {
        // Tampilkan form untuk membuat data baru
        $penyakits = Penyakit::all();
        $gejalas = Gejala::all();

        return view('create', compact('penyakits', 'gejalas'));
    }


    public function store(Request $request)
    {
        // Validasi input sesuai kebutuhan
        $request->validate([
            'Kode_Gejala' => 'required|array',
            'Kode_Penyakit' => 'required',
        ]);

        // Simpan data aturan ke database
        foreach ($request->input('Kode_Gejala') as $kodeGejala) {
            Aturan::create([
                'Kode_Gejala' => $kodeGejala,
                'Kode_Penyakit' => $request->input('Kode_Penyakit'),
            ]);
        }

        return redirect()->route('aturan.index')->with('success', 'Data aturan berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $aturan = Aturan::findOrFail($id);
        $gejalas = Gejala::all();
        $penyakits = Penyakit::all();

        return view('admin.aturan.edit', compact('aturan', 'gejalas', 'penyakits'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Kode_Gejala' => 'required|array',
            'Kode_Penyakit' => 'required',
        ]);

        // Hapus aturan lama
        Aturan::where('id', $id)->delete();

        // Simpan data aturan yang telah diupdate
        foreach ($request->input('Kode_Gejala') as $kodeGejala) {
            Aturan::create([
                'Kode_Gejala' => $kodeGejala,
                'Kode_Penyakit' => $request->input('Kode_Penyakit'),
            ]);
        }

        return redirect()->route('aturan.index')->with('success', 'Data aturan berhasil diupdate.');
    }

    public function show($id)
    {
        $aturan = Aturan::findOrFail($id);
        return view('admin.aturan.show', compact('aturan'));
    }



    public function destroy($kodePenyakit)
    {
        // Hapus aturan sesuai dengan Kode_Penyakit yang diterima
        Aturan::where('Kode_Penyakit', $kodePenyakit)->delete();

        return redirect()->route('aturan.index')->with('success', 'Data aturan berhasil dihapus.');
    }

    public function getAturanByGejalaCodes($gejalaCodes)
    {
        // Mendapatkan aturan berdasarkan gejala yang dipilih
        $aturans = Aturan::whereIn('Kode_Gejala', $gejalaCodes)->get();

        return $aturans;
    }

    public function forwardChaining($gejalaCodes)
    {
        $fakta = [];

        foreach ($gejalaCodes as $gejalaCode) {
            $fakta[$gejalaCode] = true;
        }

        $hasilInferensi = [];

        $aturans = Aturan::all();

        foreach ($aturans as $aturan) {
            $gejalaRule = explode(',', $aturan->gejala);

            if ($this->checkFakta($gejalaRule, $fakta)) {
                $hasilInferensi[$aturan->Kode_Penyakit] = true;
            }
        }

        $penyakitCodes = array_keys($hasilInferensi);

        if (empty($penyakitCodes)) {
            return 'Tidak diketahui';
        }

        return implode(',', $penyakitCodes);
    }

    private function checkFakta($gejalaRule, $fakta)
    {
        foreach ($gejalaRule as $gejala) {
            if (!isset($fakta[$gejala]) || !$fakta[$gejala]) {
                return false;
            }
        }

        return true;
    }
}

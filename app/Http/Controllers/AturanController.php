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
        // Tampilkan semua data
        $data = Aturan::all();
        $penyakits = Penyakit::all();
        $gejalas = Gejala::all();

        return view('admin.aturan.index', compact('data', 'penyakits', 'gejalas'));
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
        // Validasi dan simpan data baru
        $request->validate([
            'Kode_Gejala' => 'required|array',
            // 'Kode_Gejala.*' => 'exists:gejalas,Kode_Gejala',
            // 'Kode_Penyakit' => 'required|array',
            'Kode_Penyakit.*' => 'exists:penyakits,Kode_Penyakit',
            // ... tambahkan validasi sesuai kebutuhan
        ]);

        $gejalaCodes = $request->input('Kode_Gejala');
        $penyakitCode = $request->input('Kode_Penyakit');

        foreach ($gejalaCodes as $gejalaCode) {
            Aturan::create([
                'Kode_Gejala' => $gejalaCode,
                'Kode_Penyakit' => $penyakitCode,
                // ... tambahkan field sesuai kebutuhan
            ]);
        }

        return redirect()->route('aturan.index')->with('success', 'Aturan berhasil ditambahkan.');
    }

    
    public function show($id)
    {
        $aturan = Aturan::findOrFail($id);
        return view('aturan.show', compact('aturan'));
    }

    public function edit($id)
    {
        $aturan = Aturan::findOrFail($id);
        return view('aturan.edit', compact('aturan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Kode_Gejala' => 'required',
            'Kode_Penyakit' => 'required',
            // ... tambahkan validasi sesuai kebutuhan
        ]);

        Aturan::findOrFail($id)->update($request->all());
        return redirect()->route('aturan.index')->with('success', 'Aturan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Aturan::findOrFail($id)->delete();
        return redirect()->route('aturan.index')->with('success', 'Aturan berhasil dihapus.');
    }
}

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
        return view('admin.aturan.show', compact('aturan'));
    }

    public function edit($id)
    {
        // Fetch the Aturan data based on the provided ID
        $aturan = Aturan::findOrFail($id);

        // Fetch additional data, like gejalas and penyakits
        $gejalas = Gejala::all();
        $penyakits = Penyakit::all();

        return view('admin.aturan.edit', compact('aturan', 'gejalas', 'penyakits'));
    }


    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'Kode_Gejala' => 'required|array',
            'Kode_Penyakit' => 'required',
            // Add other validation rules as needed
        ]);

        // Find the Aturan based on the provided ID
        $aturan = Aturan::findOrFail($id);

        // Update the Aturan data
        $aturan->update([
            'Kode_Gejala' => $validatedData['Kode_Gejala'],
            'Kode_Penyakit' => $validatedData['Kode_Penyakit'],
            // Add other fields as needed
        ]);

        return redirect()->route('aturan.index')->with('success', 'Data Aturan berhasil diupdate.');
    }

    public function destroy($id)
    {
        Aturan::findOrFail($id)->delete();
        return redirect()->route('aturan.index')->with('success', 'Aturan berhasil dihapus.');
    }
}

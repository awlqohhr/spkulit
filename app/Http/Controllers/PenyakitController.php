<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyakit;
use Illuminate\Support\Facades\Storage;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakits = Penyakit::all();
        return view('admin.penyakit.index', compact('penyakits'));
    }

    public function create()
    {
        return view('penyakit.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Kode_Penyakit' => 'required|unique:penyakits',
            'Gambar_Penyakit' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Nama_Penyakit' => 'required|string|max:255',
            'Deskripsi_Penyakit' => 'required',
        ]);

         // Handle image upload
        if ($request->hasFile('Gambar_Penyakit')) {
            $imagePath = $request->file('gambar_penyakit')->store('gambar_penyakit', 'public');
            $validatedData['Gambar_Penyakit'] = $imagePath;
        }

        // Tambahkan baris ini untuk debug
        // dd('Data Valid', $validatedData);

        // Proses penyimpanan data ke database
        Penyakit::create($validatedData);

        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        return view('penyakit.edit', compact('penyakit'));
    }

   
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Kode_Penyakit' => 'required|unique:penyakits,Kode_Penyakit,'.$id,
            'Gambar_Penyakit' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Nama_Penyakit' => 'required|string|max:255',
            'Deskripsi_Penyakit' => 'required',
        ]);
    
        $penyakit = Penyakit::findOrFail($id);
    
        // Update data fields
        $penyakit->update([
            'Kode_Penyakit' => $validatedData['Kode_Penyakit'],
            'Nama_Penyakit' => $validatedData['Nama_Penyakit'],
            'Deskripsi_Penyakit' => $validatedData['Deskripsi_Penyakit'],
        ]);
    
        // Handle image update
        if ($request->hasFile('Gambar_Penyakit')) {
            // Delete old image if needed
            if ($penyakit->Gambar_Penyakit) {
                Storage::delete('gambar_penyakit' . $penyakit->Gambar_Penyakit);
            }
    
            // Save new image
            $imagePath = $request->file('gambar_penyakit')->store('public');
    
            // Update the model with the new image path
            $penyakit->update([
                'Gambar_Penyakit' => basename($imagePath),
            ]);
        }
    
        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil diperbarui!');
    }
    

    public function destroy($id)
    {
        // Pastikan $id adalah bilangan bulat positif
        if (!is_numeric($id) || $id <= 0) {
            return redirect()->route('penyakit.index')->with('error', 'ID Penyakit tidak valid');
        }

        $penyakit = Penyakit::find($id);

        if (!$penyakit) {
            return redirect()->route('penyakit.index')->with('error', 'Penyakit tidak ditemukan');
        }

        // Delete the associated image from storage if it exists
        if ($penyakit->Gambar_Penyakit) {
            // Assuming you store images in the 'public' disk
            Storage::disk('public')->delete($penyakit->Gambar_Penyakit);
        }

        // Delete the record from the database
        $penyakit->delete();

        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil dihapus!');
    }

}
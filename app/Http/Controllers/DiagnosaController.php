<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Aturan;
use App\Models\Penyakit;
use App\Models\Diagnosa;


class DiagnosaController extends Controller
{
    public function showForm()
    {
        // Fetch gejalas from the database
        $gejalas = Gejala::all(); // Fetch your gejalas here, e.g., Gejala::all();

        return view('user.diagnosa.index', compact('gejalas'));
    }

    public function processForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_telp' => 'nullable|numeric',
            'alamat' => 'required|string|max:255',
            'Kode_Gejala' => 'required|array', // Assuming Kode_Gejala is an array
            'Kode_Gejala.*' => 'exists:gejalas,Kode_Gejala', // Validate gejala exists in the gejalas table
        ]);

        // Save the form data to the database
        $diagnosa = new Diagnosa;
        $diagnosa->nama = $validatedData['nama'];
        $diagnosa->umur = $validatedData['umur'];
        $diagnosa->jenis_kelamin = $validatedData['jenis_kelamin'];
        $diagnosa->no_telp = $validatedData['no_telp'];
        $diagnosa->alamat = $validatedData['alamat'];
        // You may need to adjust this part based on your actual database structure
        $diagnosa->save();

        // Attach gejalas to the diagnosa
        $diagnosa->gejalas()->attach($validatedData['Kode_Gejala']);

        // Now, you can add logic to find the disease based on the selected gejalas

        return redirect()->route('hasil.diagnosa'); // Redirect to the result page
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Gejala;
use App\Models\Aturan;
use App\Models\Penyakit;

class DiagnosaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::all();
        return view('user.diagnosa.index', compact('gejalas'));
    }

    public function showForm()
    {
        $gejalas = Gejala::all(); // Fetch all gejalas from the database
        return view('user.diagnosa.index', compact('gejalas'));
    }

    public function hasilDiagnosa(Request $request)
    {
        // Validate the form data
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'Nama_Gejala' => 'required|array',
            'Nama_Gejala.*' => 'exists:gejalas,Nama_Gejala', // Assuming Nama_Gejala is the column name in gejalas table
        ]);
    
        // Get selected gejalas from the form
        $selectedGejalas = $request->input('gejala');
    
        // Perform more complex diagnosis logic
        $penyakits = Penyakit::with('gejalas')->get();
    
        $results = [];
        foreach ($penyakits as $penyakit) {
            $matchedGejalas = $penyakit->gejalas->pluck('Nama_Gejala')->intersect($selectedGejalas)->count();
    
            
            $results[] = [
                'penyakit' => $penyakit,
            ];
        }
    
    
        // Get the top result
        $topResult = isset($results[0]) ? $results[0]['penyakit'] : null;

        // Pass the result to the view
        return view('user.diagnosa.hasil', compact('topResult', 'results'));
    }

}

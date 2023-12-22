<?php

// app/Http/Controllers/PenyakitController.php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penyakit;

class PenyakitController extends Controller
{
    public function create()
    {
        return view('admin.penyakit.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_penyakit' => 'required|unique:penyakit',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_penyakit' => 'required',
        ]);

        $imageName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('images/penyakit'), $imageName);

        Penyakit::create([
            'kode_penyakit' => $request->kode_penyakit,
            'gambar' => $imageName,
            'nama_penyakit' => $request->nama_penyakit,
        ]);

        return redirect()->route('penyakit')->with('success', 'Data penyakit berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penyakits = Penyakit::find($id);
    
        // Check if $penyakits is not found
        if (!$penyakits) {
            // Handle the case where the record is not found
            return redirect()->route('error.page')->with('error', 'Penyakit not found');
        }
    
        return view('penyakit', compact('penyakit'));
    }
    


    

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_penyakit' => 'required|string',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_penyakit' => 'required|string',
        ]);

        $penyakits = Penyakit::find($id);

        if (!$penyakits) {
            return redirect()->route('penyakit')->with('error', 'Data penyakit tidak ditemukan.');
        }

        $penyakits->kode_penyakit = $request->kode_penyakit;
        $penyakits->nama_penyakit = $request->nama_penyakit;

        if ($request->hasFile('gambar')) {
            // Delete old image if it exists
            if ($penyakits->gambar) {
                unlink(public_path('images/penyakit/' . $penyakits->gambar));
            }

            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/penyakit'), $imageName);

            $penyakits->gambar = $imageName;
        }

        $penyakits->save();

        return redirect()->route('penyakit')->with('success', 'Data penyakit berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $data = Penyakit::findOrFail($id);
        $data->delete();

        return redirect()->route('penyakit')
            ->with('success', 'Data berhasil dihapus');
    }
}
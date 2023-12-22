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
            'kode_penyakit' => 'required|unique:penyakits',
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
        $penyakit = Penyakit::find($id);
    
        if (!$penyakit) {
            return redirect()->route('penyakit')->with('error', 'Data penyakit tidak ditemukan.');
        }
    
        return view('penyakit.edit', compact('penyakit'));
    }
    
    
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_penyakit' => 'required|string',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_penyakit' => 'required|string',
        ]);

        $penyakit = Penyakit::find($id);

        if (!$penyakit) {
            return redirect()->route('penyakit')->with('error', 'Data penyakit tidak ditemukan.');
        }

        $penyakit->kode_penyakit = $request->kode_penyakit;
        $penyakit->nama_penyakit = $request->nama_penyakit;

        if ($request->hasFile('gambar')) {
            // Delete old image if it exists
            if ($penyakit->gambar) {
                unlink(public_path('images/penyakit/' . $penyakit->gambar));
            }

            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/penyakit'), $imageName);

            $penyakit->gambar = $imageName;
        }

        $penyakit->save();

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
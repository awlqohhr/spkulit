<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;

class GejalaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
        return view('admin.gejala.index', compact('gejala'));
    }

    public function create()
    {
        return view('gejala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Kode_Gejala' => 'required',
            'Nama_Gejala' => 'required',
        ]);

        Gejala::create($request->all());

        return redirect()->route('gejala.index')->with('success', 'Gejala Berhasil Dibuat');
    }

    public function edit(Gejala $gejala)
    {
        return view('gejala.edit', compact('gejala'));
    }

    public function update(Request $request, Gejala $gejala)
    {
        $request->validate([
            'Kode_Gejala' => 'required',
            'Nama_Gejala' => 'required',
        ]);

        $gejala->update($request->all());

        return redirect()->route('gejala.index')->with('success', 'Gejala Berhasil Diperbarui');
    }

    public function destroy(Gejala $gejala)
    {
        $gejala->delete();

        return redirect()->route('gejala.index')->with('success', 'Gejala Berhasil Dihapus');
    }
}

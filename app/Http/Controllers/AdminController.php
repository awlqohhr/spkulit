<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyakit;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }


    public function penyakit()
    {
        $penyakits = Penyakit::all();
        // dd($penyakits);
        return view('admin.penyakit.index', compact('penyakits'));
    }
    

}

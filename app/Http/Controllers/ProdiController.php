<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::all();
        return view('prodi.index', compact('prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input
        $input = $request->validate([
            'nama' => 'required',
            'singkatan' => 'required|max:5',
            'kaprodi' => 'required',
            'sekretaris' => 'required',
            'fakultas_id' => 'required',
        ]);

        // simpan data ke tabel prodi
        Prodi::updated($input);

        // redirect ke route prodi.index
        return redirect()->route('prodi.index')->with('success', 'Program studi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        $fakultas = Fakultas::all();
        return view('prodi.edit', compact('prodi', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
{
    $request->validate([
        'nama' => 'required',
        'kode' => 'required', 
        'singkatan' => 'required',
        'jenjang' => 'required',
        'akreditasi' => 'required',
        'sekretaris' => 'required',
        'fakultas_id' => 'required',
    ]);

    // PERBAIKAN: Instance sudah ada dari route binding
    $prodi->update($request->all());

    return redirect()->route('prodi.index')->with('success', 'Program studi berhasil diupdate');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($prodi)
    {
        $prodi = Prodi::findOrFail($prodi);
        // dd($prodi);

        // hapus data prodi
        $prodi->delete();

        // redirect ke route prodi.index
        return redirect()->route('prodi.index')->with('success', 'Program studi berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matakuliahs = Matakuliah::with('prodi')->get();
        return view('Matakuliah.index', compact('matakuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = Prodi::all();
        return view('Matakuliah.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode_mk' => 'required|string|max:50',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        Matakuliah::create($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matakuliah $matakuliah)
    {
        return view('Matakuliah.show', compact('matakuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matakuliah $matakuliah)
    {
        $prodis = Prodi::all();
        return view('Matakuliah.edit', compact('matakuliah', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode_mk' => 'required|string|max:50',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        $matakuliah->update($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil dihapus.');
    }
}

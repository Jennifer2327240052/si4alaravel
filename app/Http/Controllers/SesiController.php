<?php

namespace App\Http\Controllers;

use App\Models\sesi;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sesis = sesi::all();
        return view('Sesi.index', compact('sesis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Sesi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        sesi::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(sesi $sesi)
    {
        return view('Sesi.show', compact('sesi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sesi $sesi)
    {
        return view('Sesi.edit', compact('sesi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sesi $sesi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $sesi->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sesi $sesi)
    {
        $sesi->delete();
        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil dihapus.');
    }
}

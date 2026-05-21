<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data fakultas
        $result = Fakultas::all();

        return view('fakultas.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $input = $request->validate([
            'nama_fakultas' => 'required|unique:fakultas,nama_fakultas',
            'singkatan'     => 'required'
        ]);

        // Simpan data
        Fakultas::create($input);

        return redirect()
                ->route('fakultas.index')
                ->with('success', 'Data fakultas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        return view('fakultas.show', compact('fakultas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas)
    {
        return view('fakultas.edit', compact('fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        // Validasi
        $input = $request->validate([
            'nama_fakultas' => 'required|unique:fakultas,nama_fakultas,' . $fakultas->id,
            'singkatan'     => 'required'
        ]);

        // Update data
        $fakultas->update($input);

        return redirect()
                ->route('fakultas.index')
                ->with('success', 'Data fakultas berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakultas)
    {
        $fakultas->delete();

        return redirect()
                ->route('fakultas.index')
                ->with('success', 'Data berhasil dihapus');
    }
}
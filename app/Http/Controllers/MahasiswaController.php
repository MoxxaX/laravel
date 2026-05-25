<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with('prodi')->get();

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = Prodi::all();

        return view('mahasiswa.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'npm' => 'required',
            'nama' => 'required',
            'prodi_id' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // upload foto
        if ($request->hasFile('foto')) {

            $foto = $request->file('foto');

            $nama_foto = time() . '-' . $foto->getClientOriginalName();

            $foto->storeAs('fotos', $nama_foto, 'public');

            $input['foto'] = 'fotos/' . $nama_foto;

        } else {

            $input['foto'] = null;
        }

        Mahasiswa::create($input);

        return redirect()
                ->route('mahasiswa.index')
                ->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

        public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()
                ->route('mahasiswa.index')
                ->with('success', 'Data berhasil dihapus');
    }
}
@extends('main')

@section('title', 'Tambah Mahasiswa')

@section('content')

<form action="{{ route('mahasiswa.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    {{-- NPM --}}
    <div class="form-group">
        <label for="">NPM</label>

        <input type="text"
               name="npm"
               class="form-control"
               value="{{ old('npm') }}">
    </div>

    @error('npm')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror


    {{-- Nama --}}
    <div class="form-group mt-2">
        <label for="">Nama Mahasiswa</label>

        <input type="text"
               name="nama"
               class="form-control"
               value="{{ old('nama') }}">
    </div>

    @error('nama')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror


    {{-- Foto --}}
    <div class="form-group mt-2">
        <label for="">Foto</label>

        <input type="file"
               name="foto"
               class="form-control">
    </div>

    @error('foto')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror


    {{-- Prodi --}}
    <div class="form-group mt-2">
        <label for="">Program Studi</label>

        <select name="prodi_id" class="form-control">

            <option value="">-- Pilih Prodi --</option>

            @foreach($prodis as $prodi)

                <option value="{{ $prodi->id }}"
                    {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>

                    {{ $prodi->nama_prodi }}

                </option>

            @endforeach

        </select>
    </div>

    @error('prodi_id')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror


    <button type="submit"
            class="btn btn-primary mt-3">

        Simpan

    </button>

</form>

@endsection
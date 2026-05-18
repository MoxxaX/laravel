@extends('main')

@section('title', 'Tambah Prodi')

@section('content')

<form action="{{ route('prodi.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nama Program Studi</label>
        <input type="text"
               name="nama_prodi"
               class="form-control"
               value="{{ old('nama_prodi') }}">
    </div>

    @error('nama_prodi')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror


    <div class="form-group mt-2">
        <label>Singkatan</label>
        <input type="text"
               name="singkatan"
               class="form-control"
               value="{{ old('singkatan') }}">
    </div>

    @error('singkatan')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror


    <div class="form-group mt-2">
        <label>Kaprodi</label>
        <input type="text"
               name="kaprodi"
               class="form-control"
               value="{{ old('kaprodi') }}">
    </div>

    @error('kaprodi')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror


    <div class="form-group mt-2">
        <label>Fakultas</label>
        <select name="fakultas_id" class="form-control">
            <option value="">-- Pilih Fakultas --</option>

            @foreach($fakultas as $item)
                <option value="{{ $item->id }}">
                    {{ $item->nama_fakultas }}
                </option>
            @endforeach
        </select>
    </div>

    @error('fakultas_id')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror


    <button type="submit" class="btn btn-primary mt-3">
        Simpan
    </button>

</form>

@endsection
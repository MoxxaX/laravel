@extends('main')

@section('title', 'Ubah Fakultas')

@section('content')

<form action="{{ route('fakultas.update', $fakultas->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    {{-- Nama Fakultas --}}
    <div class="mb-3">

        <label class="form-label">
            Nama Fakultas
        </label>

        <input type="text"
               name="nama_fakultas"
               class="form-control"
               value="{{ old('nama_fakultas', $fakultas->nama_fakultas) }}">

        @error('nama_fakultas')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Singkatan --}}
    <div class="mb-3">

        <label class="form-label">
            Singkatan
        </label>

        <input type="text"
               name="singkatan"
               class="form-control"
               value="{{ old('singkatan', $fakultas->singkatan) }}">

        @error('singkatan')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>

    <button type="submit"
            class="btn btn-primary">
        Update
    </button>

    <a href="{{ route('fakultas.index') }}"
       class="btn btn-secondary">
        Kembali
    </a>

</form>

@endsection
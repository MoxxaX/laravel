@extends('main')

@section('title', 'Mahasiswa')

@section('content')

<a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">
    Tambah Mahasiswa
</a>

<table class="table table-bordered mt-2" border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>NPM</th>
        <th>Nama</th>
        <th>Foto</th>
        <th>Program Studi</th>
        <th>Aksi</th>
    </tr>

    @foreach($mahasiswas as $key => $mhs)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $mhs->npm }}</td>
        <td>{{ $mhs->nama }}</td>

        <td>
            @if ($mhs->foto)
                <img src="{{ asset('storage/' . $mhs->foto) }}"
                     alt="Foto Mahasiswa"
                     width="100">
            @else
                <p>Foto tidak tersedia</p>
            @endif
        </td>

        <td>
            {{ $mhs->prodi->nama_prodi ?? '-' }}
        </td>

        <td>
            {{-- Tombol Edit --}}
            <a href="{{ route('mahasiswa.edit', $mhs->id) }}"
               class="btn btn-warning btn-sm">

                <i class="bi bi-pencil-square"></i>
                Edit
            </a>

            {{-- Tombol Hapus --}}
            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}"
                  method="POST"
                  style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="btn btn-danger btn-sm show_confirm"
                        data-nama="{{ $mhs->nama }}">

                    <i class="bi bi-trash"></i>
                    Hapus

                </button>

            </form>
        </td>

    </tr>
    @endforeach

</table>

@endsection
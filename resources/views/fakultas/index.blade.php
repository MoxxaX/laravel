@extends('main')

@section('title', 'Data Fakultas')

@section('content')

{{-- Alert Success --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show"
         role="alert">

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif

{{-- Tombol Tambah --}}
<a href="{{ route('fakultas.create') }}"
   class="btn btn-primary mb-3">

    <i class="bi bi-plus-circle"></i>
    Tambah Fakultas

</a>

{{-- Table --}}
<div class="table-responsive">

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th width="50">No</th>
                <th>Nama Fakultas</th>
                <th>Singkatan</th>
                <th width="220">Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse ($result as $key => $item)

                <tr>

                    <td>{{ $key + 1 }}</td>

                    <td>{{ $item->nama_fakultas }}</td>

                    <td>{{ $item->singkatan }}</td>

                    <td>

                        {{-- Tombol Edit --}}
                        <a href="{{ route('fakultas.edit', $item->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil-square"></i>
                            Edit

                        </a>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('fakultas.destroy', $item->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm show_confirm"
                                    data-nama="{{ $item->nama_fakultas }}">

                                <i class="bi bi-trash"></i>
                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="4" class="text-center">
                        Data fakultas kosong
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection
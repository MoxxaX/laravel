@extends('main')

@section('title', 'Fakultas')

@section('content')

<a href="{{ route('fakultas.create') }}" class="btn btn-primary">
    Tambah
</a>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Fakultas</th>
            <th>Singkatan</th>
            <th width="200">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($result as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nama_fakultas }}</td>
                <td>{{ $item->singkatan }}</td>

                <td>
                    <form action="{{ route('fakultas.destroy', $item->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')
                        <input name=" _method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm"
                            data-toggle="tooltip" title='Delete'
                            data-nama='{{ $item->nama }}'>Hapus
                        </button>
                    </form>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

@endsection
@extends('main')

@section('title', 'Program Studi')

@section('content')
    <a href="{{route('prodi.create')}}" class="btn btn-primary">Tambah Prodi</a>
    <a href="   " class="btn btn-danger">Hapus</a>
    <a href="   " class="btn btn-warning">Perbarui</a>

    <table class="table table-bordered mt-2" border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama Prodi</th>
        <th>Singkatan</th>
        <th>Kaprodi</th>
        <th>Fakultas</th>
        <th>Singkatan</th>
    </tr>

    @foreach($prodis as $key => $prodi)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $prodi->nama_prodi }}</td>
        <td>{{ $prodi->singkatan }}</td>
        <td>{{ $prodi->kaprodi }}</td>
        <td>{{ $prodi->fakultas->nama_fakultas ?? '-' }}</td>
        <td>{{ $prodi->fakultas->singkatan}}</td>
    </tr>
    @endforeach

</table>
@endsection

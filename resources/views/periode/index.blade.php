@extends('main')

@section('title', 'Periode')

@section('content')
   <a href="{{route('periode.create')}}" class="btn btn-primary">Tambah</a>
   <a href="   " class="btn btn-danger">Hapus</a>
   <a href="   " class="btn btn-warning">Perbarui</a>
   
   <table class="table table-bordered mt-2">
      <thead>
         <tr>
               <th>Tahun Akademik</th>
               <th>Semester</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($result as $item)
               <tr>
                  <td>{{ $item -> tahun_akademik }}</td>
                  <td>{{ $item -> semester }}</td>
               </tr>
         @endforeach
      </tbody>
    </table>
    
@endsection
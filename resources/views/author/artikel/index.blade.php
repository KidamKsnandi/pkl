@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#artikel').DataTable();
        });
    </script>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-1o">
                <h2 class="m-0">Data Artikel</h2>
            </div>
        </div>
    </div>
</div>
@include('layouts._flash')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('artikel.create')}}" class="btn btn-sm btn-info float-right text-white">Tambah Data artikel</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="artikel">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Judul Artikel</th>
                                <th>Cover</th>
                                <th>Konten</th>
                                <td>Penulis</td>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($artikel as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->judul }}</td>
                                <td><img src="{{$data->cover()}}" alt="" style="width:150px; height:150px;" alt="Cover"></td>
                                <td>Konten {{ $data->judul }}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>
                                    <form action="{{ route('artikel.destroy', $data->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{ route('artikel.edit', $data->id) }}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{ route('artikel.show', $data->id) }}" class="btn btn-outline-warning">Show</a>
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

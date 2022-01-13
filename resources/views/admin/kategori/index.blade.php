@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#kategori').DataTable();
        });
    </script>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-1o">
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
                    <h2 class="m-0">Data Kategori</h2>
                    <a href="{{route('kategori.create')}}" class="btn btn-sm btn-info float-right text-white">Tambah Data Kategori</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="kategori">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi Kategori</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($kategori as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>{{ $data->deskripsi_kategori }}</td>
                                <td>
                                    <form action="{{ route('kategori.destroy', $data->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{ route('kategori.edit', $data->id) }}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{ route('kategori.show', $data->id) }}" class="btn btn-outline-warning">Show</a>
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

@extends('layouts.admin')

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
                    <h2 class="m-0">Galeri {{ $wisata->nama_wisata }}</h2>
                    <a href="galeri/create" class="btn btn-sm btn-info float-right text-white">Tambah Data Galeri</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nomor</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($galeri as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><img src=" {{ $data->galeri() }}" alt="" style="width:150px; height:150px;" alt="Gambar"></td>
                                <td>
                                    <form action="galeri/delete/{{ $data->id }}" method="POST">
                                        @csrf
                                        <a href="galeri/edit/{{ $data->id }}" class="btn btn-outline-info">Edit</a>
                                        <a href="galeri/show/{{ $data->id }}" class="btn btn-outline-warning">Show</a>
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

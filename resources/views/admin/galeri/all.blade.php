@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-1o">
                <h2 class="m-0">Data Galeri</h2>
            </div>
        </div>
    </div>
</div>
@include('layouts._flash')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Wisata</th>
                                <th>Nama Kategori</th>
                                <th>Gambar</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($galeri as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->wisata->nama_wisata }}</td>
                                <td>{{ $data->wisata->kategori->nama_kategori }}</td>
                                <td><img src=" {{ $data->galeri() }}" alt="" style="width:350px; height:300px;" alt="Gambar"></td>
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

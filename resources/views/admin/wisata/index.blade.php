@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-1o">
                <h2 class="m-0">Data Wisata Bandung</h2>
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
                    <a href="{{route('wisata.create')}}" class="btn btn-sm btn-info float-right text-white">Tambah Data Wisata</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Wisata</th>
                                <th>Kategori Wisata</th>
                                <th>Lokasi</th>
                                <th>Deskripsi Kategori</th>
                                <th>Harga Tiket</th>
                                <th>Cover</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($wisata as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_wisata }}</td>
                                <td>{{ $data->kategori->nama_kategori }}</td>
                                <td>{{ $data->lokasi }}</td>
                                <td>{{ $data->deskripsi_wisata }}</td>
                                <td>{{ $data->harga_tiket }}</td>
                                <td><img src="{{$data->cover()}}" alt="" style="width:150px; height:150px;" alt="Cover"></td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <form action="{{ route('wisata.destroy', $data->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{ route('wisata.edit', $data->id) }}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{ $data->slug }}/galeri" class="btn btn-outline-warning">Lihat Galeri</a>
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

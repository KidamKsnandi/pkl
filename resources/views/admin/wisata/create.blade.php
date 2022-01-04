@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Kategori</div>
                <div class="card-body">
                    <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Wisata</label>
                            <div class="input-group input-group-outline">
                            <input type="text" name="nama_wisata" class="form-control @error('nama_wisata') is-invalid @enderror">
                            @error('nama_wisata')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Kategori Wisata</label>
                            <div class="input-group input-group-outline">
                            <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" >
                                @foreach($kategori as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kategori}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Lokasi</label>
                            <div class="input-group input-group-outline">
                            <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror">
                            @error('lokasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Wisata</label>
                            <div class="input-group input-group-outline">
                            <textarea name="deskripsi_wisata" class="form-control @error('deskripsi_wisata') is-invalid @enderror"></textarea>
                            @error('deskripsi_wisata')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Harga Tiket</label>
                            <div class="input-group input-group-outline">
                            <input type="number" name="harga_tiket" class="form-control @error('harga_tiket') is-invalid @enderror">
                            @error('harga_tiket')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            @csrf
                            <label for="">Cover</label>
                            <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror">
                            @error('cover')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <div class="input-group input-group-outline">
                            <select name="status" class="form-control">
                                <option value="Normal">Normal</option>
                                <option value="Rekomendasi">Rekomendasi</option>
                                <option value="Populer">Populer</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <button type="reset" class="btn btn-danger text-white">Reset</button>
                            <button type="submit" class="btn btn-info text-white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

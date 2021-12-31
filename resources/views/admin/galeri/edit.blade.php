@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Galeri</div>
                <div class="card-body">
                    <form action="{{ $galeri->id }}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="">Gambar</label>
                            <br>
                            <img src="{{ $galeri->galeri() }}" height="75" style="padding:10px;" />
                            <input type="file" name="gambar" class="form-control @error('cover') is-invalid @enderror">
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

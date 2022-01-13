@extends('layouts.admin')

@section('ckeditor')
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script>
    var konten = document.getElementById("konten");
        CKEDITOR.replace(konten,{
        language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Artikel</div>
                <div class="card-body">
                    <form action="{{ $artikel->id }}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Judul</label>
                            <div class="input-group input-group-outline">
                            <input type="text" name="judul" value="{{ $artikel->judul }}" class="form-control @error('judul') is-invalid @enderror" readonly>
                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Cover</label>
                            <br>
                            <img src="{{ $artikel->cover() }}" style="width:350px; height:300px; padding:10px;" />
                        </div>
                        <div class="form-group">
                            <label for="">Konten</label>
                            <div class="input-group input-group-outline">
                            <textarea name="konten" id="konten" rows="30" cols="50" class="form-control @error('konten') is-invalid @enderror" readonly>{{ $artikel->konten }}</textarea>
                            @error('konten')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Penulis</label>
                            <div class="input-group input-group-outline">
                            <input type="text" value="{{ $artikel->user->name }}" class="form-control" readonly>
                            <input type="hidden" name="id_user" value="{{ $artikel->user->id }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Tambahkan Ke Slide</label>
                            <div class="input-group input-group-outline">
                            <select name="slider" class="form-control @error('slider') is-invalid @enderror">
                                <option value=""></option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                            @error('slider')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="/admin/article" class="btn btn-danger text-white">Kembali</a>
                            <button type="submit" class="btn btn-info text-white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

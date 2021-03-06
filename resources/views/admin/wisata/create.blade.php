@extends('layouts.admin')

@section('ckeditor')
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script>
    var deskripsi_wisata = document.getElementById("deskripsi_wisata");
        CKEDITOR.replace(deskripsi_wisata,{
        language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
    </script>
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript">
        $('.addwisata').on('click', function() {
            addwisata();
        });

        function addwisata() {
            var wisata = '<div><div class="form-group"> <label for="">Nama Wisata</label> <div class="input-group input-group-outline"><input type="text" name="nama_wisata" class="form-control @error('nama_wisata') is-invalid @enderror">@error('nama_wisata')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong> </span> @enderror</div></div><div class="form-group mt-3"><label for="">Kategori Wisata</label><div class="input-group input-group-outline"><select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" >@foreach($kategori as $data)<option value="{{$data->id}}">{{$data->nama_kategori}}</option> @endforeach</select></div></div><div class="form-group"><label for="">Lokasi</label><div class="input-group input-group-outline"><input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror">@error('lokasi')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror</div></div><div class="form-group"><label for="">Deskripsi Wisata</label><div class="input-group input-group-outline"><textarea name="deskripsi_wisata" id="deskripsi_wisata" rows="8" class="form-control @error('deskripsi_wisata') is-invalid @enderror"></textarea> @error('deskripsi_wisata')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror</div></div><div class="form-group"><label for="">Harga Tiket</label><div class="input-group input-group-outline"><input type="number" name="harga_tiket" class="form-control @error('harga_tiket') is-invalid @enderror">@error('harga_tiket')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div><div class="form-group">@csrf<label for="">Cover</label><input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror">@error('cover')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="form-group"><label for="">Status</label><div class="input-group input-group-outline"><select name="status" class="form-control"><option value="">-- Status --</option><option value="Normal">Normal</option><option value="Rekomendasi">Rekomendasi</option><option value="Populer">Populer</option></select></div></div><div class="form-group mt-3"><a href="#" class="remove btn btn-danger" style="float: right;">Hapus</a></div></div>';
            $('.wisata').append(wisata);
        };
        $('.remove').live('click', function() {
            $(this).parent().parent().remove();
        });
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                    <h3 class="col-sm-10">Data Wisata</h3>
                    <a href="/admin/wisata" class="fa fa-arrow-left btn btn-secondary">&nbsp;Kembali</a>
                </div>
                </div>
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
                            <textarea name="deskripsi_wisata" id="deskripsi_wisata" rows="30" cols="50" class="form-control @error('deskripsi_wisata') is-invalid @enderror"></textarea>
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
                                <option value="">-- Status --</option>
                                <option value="Normal">Normal</option>
                                <option value="Rekomendasi">Rekomendasi</option>
                                <option value="Populer">Populer</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <a href="#" class="addwisata btn btn-success" style="float: right;">Tambah Wisata</a>
                        </div>
                        <div class="wisata"></div>
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

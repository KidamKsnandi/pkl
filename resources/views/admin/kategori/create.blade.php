@extends('layouts.admin')

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript">
        $('.addkategori').on('click', function() {
            addkategori();
        });

        function addkategori() {
            var kategori = '<div><div class="form-group mt-6"><label for="">Nama Kategori</label><div class="input-group input-group-outline"><input type="text" name="nama_kategori[]" class="form-control @error('nama_kategori') is-invalid @enderror">@error('nama_kategori')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror</div></div><div class="form-group mt-3"><label for="">Deskripsi Kategori</label><div class="input-group input-group-outline"><input type="text" name="deskripsi_kategori[]"class="form-control @error('deskripsi_kategori') is-invalid @enderror">@error('deskripsi_kategori')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div><div class="form-group mt-3"><a href="#" class="remove btn btn-danger" style="float: right;">Hapus</a></div></div>';
            $('.kategori').append(kategori);
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
                        <h3 class="col-sm-10">Data Kategori</h3>
                        <a href="/admin/artikel" class="fa fa-arrow-left btn btn-secondary">&nbsp;Kembali</a>
                        </div>


                    </div>
                    <div class="card-body">

                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Kategori</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="nama_kategori[]"
                                        class="form-control @error('nama_kategori') is-invalid @enderror">
                                    @error('nama_kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Deskripsi Kategori</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="deskripsi_kategori[]"
                                        class="form-control @error('deskripsi_kategori') is-invalid @enderror">
                                    @error('deskripsi_kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <a href="#" class="addkategori btn btn-success" style="float: right;">Tambah Kategori</a>
                            </div>
                            <div class="kategori"></div>
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

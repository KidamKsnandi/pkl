@include('layouts.partials.header')
<title>Penentuan Wisata</title>
<div class="container">
    <div class="products-heading">
        <h2 style="text-transform:uppercase;">Detail Wisata {{ $wisata->nama_wisata }}</h2>
    </div>
    <a href="javascript:history.back()" class="btn btn-lg btn-default text-white"><i class="fa fa-arrow-left"></i> Kembali
    </a>
    <a href="/{{ $wisata->slug }}/galeriwisata" class="btn btn-lg btn-default text-white"><i class="fa fa-image"></i>
        Galeri </a> <br><br>
    <div class="card mb-6">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src=" {{ $wisata->cover() }}" style="width:350px; height:220px;" alt="Cover">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">{{ $wisata->nama_wisata }}</h3>
                    <p class="card-text">Kategori : {{ $wisata->kategori->nama_kategori }}</p>
                    <p class="card-text">Lokasi : {{ $wisata->lokasi }}</p> <br>
                    <h5>Deskripsi :</h5>
                    <p class="card-text">{!! $wisata->deskripsi_wisata !!}</p>
                </div>
            </div>
        </div>
        <br><br><br>
        <b>Harga Tiket : @if ($wisata->harga_tiket == 'Gratis') {{ $wisata->harga_tiket }}
            @else {{ number_format($wisata->harga_tiket) }}
            @endif</b>
    </div>
</div>

<section id="catagorie">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-heading">
                    </div>
                </div> <!-- End of /.block -->
            </div> <!-- End of /.col-md-12 -->
        </div> <!-- End of /.row -->
    </div> <!-- End of /.container -->
</section> <!-- End of Section -->

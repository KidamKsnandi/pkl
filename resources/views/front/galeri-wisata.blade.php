@include('layouts.partials.header')
<title>Penentuan Wisata</title>
<div class="container">
    <div class="products-heading">
        <h2 style="text-transform:uppercase;">Galeri Wisata {{ $wisata->nama_wisata }}</h2>
    </div>
    <a href="javascript:history.back()" class="btn btn-lg btn-default text-white"><i class="fa fa-arrow-left"></i> Kembali </a>
    <a href="/{{ $wisata->slug }}/galeriwisata" class="btn btn-lg btn-default text-white"><i class="fa fa-image"></i> Galeri </a> <br><br>
<div class="row">
        @foreach($galeri as $data)
            <div class="col-sm-6 col-md-4"><br><br>
                <div class="thumbnail">
                        <img src=" {{ $data->galeri() }}" style="width:350px; height:220px;" alt="Galeri">
                </div>
            </div>
            @endforeach

        </div>
  </div>
</div>
</div>

<section id="catagorie">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<div class="block-heading">
						</div>
                    </div>	<!-- End of /.block -->
				</div>	<!-- End of /.col-md-12 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of Section -->

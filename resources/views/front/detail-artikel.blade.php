@include('layouts.partials.header')
<title>Penentuan Wisata</title>
<div class="container">
    <div class="products-heading">

    </div>
    <a href="javascript:history.back()" class="btn btn-lg btn-default text-white"><i class="fa fa-arrow-left"></i> Kembali </a>
    <br>
		<div class="container">
				<div class="col-md-12 text-center">
                    <h1>{{ $artikel->judul }}</h1> <br>
                        <img src=" {{ $artikel->cover() }}" style="width:800px; height:400px;" alt="Cover">
				</div>	<!-- End of /.col-md-12 -->
		</div>	<!-- End of /.container -->

        <div class="container">
				<div class="col-md-12">
                    <br><br>
                    <p> {!! $artikel->konten !!} </p>
                    <br><br>
                    <p style="float: right;">Di buat oleh : {{ $artikel->user->name }} </p>
                    <br><br>
                    <small class="text-muted" style="float: right;" >Last updated {{ $artikel->created_at->diffForHumans() }}</small>
				</div>	<!-- End of /.col-md-12 -->
		</div>	<!-- End of /.container -->


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

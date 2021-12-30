<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Penentuan Wisata</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Fonts -->
	{{-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'> --}}

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

	<!-- Css -->
	<link rel="stylesheet" href="{{ asset('front/css/nivo-slider.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('front/css/owl.theme.css') }}">
	<link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">

	<!-- jS -->
	<script src="{{ asset('front/js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('front/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('front/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
	<script src="{{ asset('front/js/owl.carousel.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('front/js/jquery.nicescroll.js')}}"></script>
	<script src="{{ asset('front/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ asset('front/js/main.js')}}" type="text/javascript"></script>
    <title>Penentuan Wisata</title>


</head>
<body>

    <style>
        body {
            background-image: url('images/bg-1.jpg');
            background-repeat: no-repeat;
            background-size: cover
        }
    </style>

@include('layouts.partials.login')
<!-- TOP HEADER Start
    ================================================== -->
<!-- End of /Section -->

	<!-- CATAGORIE Start
    ================================================== -->

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<div class="block-heading">
							<h2>Selamat Darang di Website Informasi Wisata Bandung</h2>
						</div>
					</div>	<!-- End of /.block -->
				</div>	<!-- End of /.col-md-12 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<div class="block-heading">
							<h2>Jalan Jalan Di Bandung Enaknya Kemana Nih? </h2>
						</div>
                        <div class="block-heading">
							<h2>Pilih Sesuai Kategori :</h2>
						</div>
						<div class="row">
                                <center><button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button></center>
						</div>	<!-- End of /.row -->
					</div>	<!-- End of /.block -->
				</div>	<!-- End of /.col-md-12 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->

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

@include('layouts.partials.footer')

</body>
</html>

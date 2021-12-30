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


</head>
  <!-- LOGO Start
    ================================================== -->
    
    <header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>
                        <a href="/">
                            <b>
                            <span class="text-primary">PENENTUAN</span><span class="text-info"> WISATA</span>
                        </b>
                        </a>
                    </h2>
				</div>	<!-- End of /.col-md-12 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</header> <!-- End of /Header -->



	<!-- MENU Start
    ================================================== -->

    <nav class="navbar navbar-default">
		<div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div> <!-- End of /.navbar-header -->

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav nav-main">
		        	<li class="active"><a href="#">BERANDA</a></li>
					<li><a href="products.html">OBJEK WISATA</a></li>
					<li class="dropdown">
						<a href="#">
							KATEGORI
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
						   <li><a  href="#">Alam</a></li>
						    <li><a  href="#">Bahari</a></li>
						    <li><a  href="#">Budaya</a></li>
						    <li><a  href="#">Buru</a></li>
						</ul>
                    </li>



		        </ul> <!-- End of /.nav-main -->

		    </div>	<!-- /.navbar-collapse -->
		</div>	<!-- /.container-fluid -->
	</nav>	<!-- End of /.nav -->


@yield('content')


<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class=" clearfix">
						<h2>
                        <a href="/">
                            <b>
                            <span class="text-primary">Penentuan</span><span class="text-warning"> Wisata</span>
                        </b>
                        </a>
                        </h2>
						<p>
							Website ini bertujuan untuk memuat informasi tentang objek wisata di bandung untuk memudahkan pengunjung dalam menentukan objek wisata yang ingin di pilih
						</p>
					</div>	<!-- End Of /.block -->
				</div> <!-- End Of /.Col-md-4 -->
				<div class="col-md-4">
					<div class="block">
						<h4>HUBUNGI KAMI</h4>
						<p ><i class="fa  fa-user"></i> <span>Kidam Kusnandi</span> (Web Developer)</p>
						<p> <i class="fa  fa-phone"></i> <span>Phone:</span> (+62) 83 807 464 449 </p>

						<p class="mail"><i class="fa  fa-envelope"></i>Email: <span>kidamkusnandi@gmail.com</span></p>
					</div>	<!-- End Of /.block -->
				</div> <!-- End Of Col-md-3 -->
				<div class="col-md-4">
					<div class="block">
						<h4>Update Selanjutnya</h4>
						<div class="media">
						  	Fitur Komentar <br>
						  	Akan Datang
						</div>	<!-- End Of /.media -->
					</div>	<!-- End Of /.block -->
				</div> <!-- End Of Col-md-3 -->
			</div> <!-- End Of /.row -->
		</div> <!-- End Of /.Container -->



	<!-- FOOTER-BOTTOM Start
    ================================================== -->

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<p class="copyright-text pull-right">2021 © Penentuan Wisata by <a
                    href="https://www.instagram.com/kidamkusnandi06/">Kidam Kusnandi</p>
					</div>	<!-- End Of /.col-md-12 -->
				</div>	<!-- End Of /.row -->
			</div>	<!-- End Of /.container -->
		</div>	<!-- End Of /.footer-bottom -->
	</footer>

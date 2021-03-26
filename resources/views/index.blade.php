<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel=”icon” href="{{url('/assets/images/logo.png')}}">
	<title>@yield('title') | KPRI Kurnia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="/assets/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/assets/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="/assets/css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="/assets/css/flexslider.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="/assets/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="/assets/css/style.css">

	<!-- Modernizr JS -->
	<script src="/assets/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
   	<div class="ftco-loader"></div>
	
	<div id="page">
		<nav class="ftco-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div id="ftco-logo">
								<a href="{{url('/')}}"><img src="/assets/images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
									Kpri Kurnia
								</a>
							</div>
						</div>
						<div class="col-md-9 text-right menu-1">
							<ul>
							<li><a href="{{url('/')}}">Home</a></li>
								<li><a href="{{url('profile')}}">PROFILE</a></li>
								<li><a href="{{url('layanan')}}">LAYANAN</a></li>
								<li><a href="{{url('pendaftaran')}}">DAFTAR </a></li>
								<li><a href="{{url('anggota/login')}}"> | LOGIN</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</nav>

	<aside id="ftco-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(/assets/images/hero_1.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1><strong>Selamat Datang</strong></h1>
									<h2>KPRI KURNIA JATIBARANG</h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="{{url('pendaftaran')}}">Gabung Sekarang</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(/assets/images/hero_3.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
									<h1><strong>Selamat Datang</strong></h1>
									<h2>KPRI KURNIA JATIBARANG</h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="{{url('pendaftaran')}}">Gabung Sekarang</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(/assets/images/hero_2.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
									<h1><strong>Selamat Datang</strong></h1>
									<h2>KPRI KURNIA JATIBARANG</h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="{{url('pendaftaran')}}">Gabung Sekarang</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>		   	
		  	</ul>
	  	</div>
	</aside>

		@yield('content')

	<footer id="ftco-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 ftco-widget">
					<h4>KPRI KURNIA JATIBARANG</h4>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
				</div>
				<div class="col-md-4 col-md-push-1">
					<h4>Navigation</h4>
					<ul class="ftco-footer-links">
						<li><a href="{{url('/')}}">Home</a></li>
						<li><a href="{{url('layanan')}}">Layanan</a></li>
						<li><a href="{{url('profile')}}">Profile</a></li>
						<li><a href="{{url('faq')}}">FAQ</a></li>
					</ul>
				</div>

				<div class="col-md-4 col-md-push-1">
					<h4>Jam Layanan</h4>
					<ul class="ftco-footer-links">
						<li>Senin - Kamis : 9:00 - 21 00</li>
						<li>Jum'at 8:00 - 21 00</li>
						<li>Sabtu 9:30 - 15: 00</li>
						<li>Minggu, tanggal merah dan</li>
						<li>hari libur nasional</li>
						<li>Tutup</li>
					</ul>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | KPRI KURNIA JATIBARANG</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
				</div>
			</div>

		</div>
	</footer>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="/assets/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="/assets/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/assets/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="/assets/js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="/assets/js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="/assets/js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="/assets/js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="/assets/js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="/assets/js/jquery.magnific-popup.min.js"></script>
	<script src="/assets/js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="/assets/js/main.js"></script>
	

	 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

	</body>
</html>


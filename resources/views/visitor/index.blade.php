<!DOCTYPE html>
<html lang="en">
<head>
	<link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<title>LERAMIZ - Landing Page Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="LERAMIZ Landing Page Template">
	<meta name="keywords" content="LERAMIZ, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="{{asset('img/favicon.ico')}}"rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro')}}" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/animate.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/style.css')}}"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 header-top-left">
						<div class="top-info">
							<i class="fa fa-phone"></i>
							(+88) 666 121 4321
						</div>
						<div class="top-info">
							<i class="fa fa-envelope"></i>
							info.leramiz@colorlib.com
						</div>
					</div>
					<div class="col-lg-6 text-lg-right header-top-right">
						<div class="top-social">
							<a href=""><i class="fa fa-facebook"></i></a>
							<a href=""><i class="fa fa-twitter"></i></a>
							<a href=""><i class="fa fa-instagram"></i></a>
							<a href=""><i class="fa fa-pinterest"></i></a>
							<a href=""><i class="fa fa-linkedin"></i></a>
						</div>
						<div class="user-panel">
							@if (auth()->user())
        
						<div class="user-panel">
							<a href="{{ route('profile.edit') }}"><i class="fa fa-cog"></i> Profile</a>
							<form  method="POST" action="{{ route('logout') }}">
								@csrf
							<button style="background: none; color:white;" type="submit"><i class="fa fa-sign-in"></i> Logout</button>
							</form>
						</div> 
				
						@else
				
						<div class="user-panel">
							<a href="{{route('register')}}"><i class="fa fa-user-circle-o"></i> Register</a>
							<a href="{{route('login')}}"><i class="fa fa-sign-in"></i> Login</a>
						</div> 
						@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="site-navbar">
						<a href="#" class="site-logo"><img src="{{asset('img/logo.png')}}" alt=""></a>
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="{{asset('img/page-top-bg.jpg')}}">
		<div class="container text-white">
			<h2>Home</h2>
		</div>
	</section>
	<!--  Page top end -->


	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>FOR SALE</span>
			<span></span>
			
		</div>
	</div>
	
	<!-- Page -->
	@foreach ($estate as $es)
  <section class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 single-list-page">
          <div class="image-list">
            {{-- Slider Container --}}
            <div class="owl-carousel owl-theme" id="estate-slider">
              @foreach ($es->images as $img)
                <div class="item">
                  <img src="{{ asset('images/' . $img->image_name) }}" alt="Estate Image" class="image-item">
                </div>
              @endforeach
						</div>

					</div>
					<div class="col-lg-12 single-list-content">
						<div class="row">
							<div class="col-xl-8 sl-title">
								<p><i class="fa fa-map-marker"></i>{{ $es->Address }}</p>
							</div>
							<div class="col-xl-4">
								<a href="#" class="price-btn">{{ $es->price }}
									<i class="fa fa-usd"></i>
								</a>
							</div>
						</div>
						<h3 class="sl-sp-title">Property Details</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-home"></i> {{ $es->direction }}</p>
								<p><i class="fa fa-user"></i> {{ $es->Contact_phone }}</p>
								<p><i class="fa fa-bed"></i> {{ $es->room_number }} room</p>
								
							</div>
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-bars"></i> {{ $es->floor }} floor</p>
								<p><i class="fa fa-building-o"></i>  {{ $es->outlook }}</p>
								<p><i class="fa fa-clock-o"></i>  {{ $es->created_at->format('Y-m-d')}}</p>
							</div>
							<div class="col-md-4">
								<p><i class="fa fa-bath"></i>   {{ $es->bath_number }} bathroom</p>
								<p><i class="fa fa-trophy"></i>  {{ $es->ownership }}</p>
								<p><i class="fa fa-user"></i>Added By: {{ App\Models\User::find($es->user_id)->name }} </p>
							
							</div>
						</div>
						<h3 class="sl-sp-title">Description</h3>
						<div class="description">
							<p> {{ $es->description }}</p>
							</div>
						<h3 class="sl-sp-title">facilities</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
									
								@if($es->parking ==1)
								 <p><i class="fa fa-check-circle-o"></i> parking </p> 
								 @endif
								 @if($es->place_for_barbecue ==1)
								 <p><i class="fa fa-check-circle-o"></i> place_for_barbecue</p> 
								 @endif
								 @if($es->left ==1)
								 <p><i class="fa fa-check-circle-o"></i> left </p> 
								 @endif
								 @if($es->TV_cable ==1)
								 <p><i class="fa fa-check-circle-o"></i> TV_cable </p> 
								 @endif
								 @if($es->internet ==1)
								 <p><i class="fa fa-check-circle-o"></i> internet </p> 
								 @endif
								 @if($es->central_heating ==1)
								 <p><i class="fa fa-check-circle-o"></i> central_heating </p> 
								 @endif

								
							</div>
						</div>
						
						
						<!-- sidebar -->
					</div>
				</div>
			</div>
		</div>
	
	<br><br>
		@endforeach
	</section>
	<!-- Page end -->

	<!-- Footer section -->
	<footer class="footer-section set-bg" data-setbg="{{asset('img/footer-bg.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 footer-widget">
					<img src="{{asset('img/logo.png')}}" alt="">
					<p>Lorem ipsum dolo sit azmet, consecter dipise consult  elit. Maecenas mamus antesme non anean a dolor sample tempor nuncest erat.</p>
					<div class="social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 footer-widget">
					<div class="contact-widget">
						<h5 class="fw-title">CONTACT US</h5>
						<p><i class="fa fa-map-marker"></i>3711-2880 Nulla St, Mankato, Mississippi </p>
						<p><i class="fa fa-phone"></i>(+88) 666 121 4321</p>
						<p><i class="fa fa-envelope"></i>info.leramiz@colorlib.com</p>
						<p><i class="fa fa-clock-o"></i>Mon - Sat, 08 AM - 06 PM</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 footer-widget">
					<div class="double-menu-widget">
						<h5 class="fw-title">POPULAR PLACES</h5>
						<ul>
							<li><a href="">Florida</a></li>
							<li><a href="">New York</a></li>
							<li><a href="">Washington</a></li>
							<li><a href="">Los Angeles</a></li>
							<li><a href="">Chicago</a></li>
						</ul>
						<ul>
							<li><a href="">St Louis</a></li>
							<li><a href="">Jacksonville</a></li>
							<li><a href="">San Jose</a></li>
							<li><a href="">San Diego</a></li>
							<li><a href="">Houston</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6  footer-widget">
					<div class="newslatter-widget">
						<h5 class="fw-title">NEWSLETTER</h5>
						<p>Subscribe your email to get the latest news and new offer also discount</p>
						<form class="footer-newslatter-form">
							<input type="text" placeholder="Email address">
							<button><i class="fa fa-send"></i></button>
						</form>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="footer-nav">
					<ul>
						<li><a href="">Home</a></li>
						<li><a href="">Featured Listing</a></li>
						<li><a href="">About us</a></li>
						<li><a href="">Pages</a></li>
						<li><a href="">Blog</a></li>
						<li><a href="">Contact</a></li>
					</ul>
				</div>
				<div class="copyright">
					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->

                                        
	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
	<script src="{{asset('js/magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>

{{-- <script>	$(document).ready(function() {
		$('.owl-carousel').each(function() {
			$(this).owlCarousel({
				loop: true,
				margin: 10,
				responsive: {
					0: { items: 1 },
					600: { items: 2 },
					1000: { items: 3 }
				}
			});
		});
	});
</script> --}}
<script>
	$(document).ready(function(){
	  $(".owl-carousel").owlCarousel({
		loop: true,
		margin: 10,
		nav: true,
		responsive: {
		  0: {
			items: 1
		  },
		  600: {
			items: 3
		  },
		  1000: {
			items: 3
		  }
		}
	  });
	});
  </script>
	<!-- load for map -->
	<script src="{{asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo')}}"></script>
	<script src="{{asset('js/map-2.js')}}"></script>

</body>
</html>
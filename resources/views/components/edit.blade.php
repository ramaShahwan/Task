<!DOCTYPE html>
<html lang="en">
<head>
	<link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

{{-- for image --}}
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>                                                                                         
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>  --}}
<!-- Include Fancybox library -->

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
							<a href=""><i class="fa fa-user-circle-o"></i> Register</a>
							<a href=""><i class="fa fa-sign-in"></i> Login</a>
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
	<section class="page-top-section set-bg" data-setbg="{{asset ('img/page-top-bg.jpg')}}">
		<div class="container text-white">
			<h2>Edit your partment</h2>
		</div>
	</section>


	<!--  Page top end -->
	@section('content')

	@if (session()->has('edit'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>{{ session()->get('edit') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
	@endsection

	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Edit</a>
			<span><i class="fa fa-angle-right"></i>FOR SALE</span>
		</div>
	</div>
					<!-- row -->
					<div class="row">
	
						<div class="col-lg-12 col-md-12">
							<div class="card">
								<div class="card-body">
									
									<form  action="{{ route('estate.update', $es->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
										@csrf
		
										<div class="row">
											<div class="col">
											  <label for="inputName" class="control-label">Contact phone</label>
											  <input type="hidden" name="Contact_phone" value="{{ $es->outlook }}">
											  <input type="text" class="form-control" id="inputName" name="Contact_phone"
											  value="{{ $es->Contact_phone }}" required>
											</div>
										  </div><br>

										  <div class="row">
											<div class="col">
											  <label for="inputName" class="control-label">Address</label>
											  <input type="hidden" name="Address" value="{{ $es->outlook }}">
											  <input type="text" class="form-control" id="inputName" name="Address"
											  value="{{ $es->Address }}" required>
											</div>
										  </div><br>

										  <div class="row">
											<div class="col">
											  <label for="inputName" class="control-label">outlook</label>
											  <input type="hidden" name="outlook" value="{{ $es->outlook }}">
											  <input type="text" class="form-control" id="inputName" name="outlook"
											  value="{{ $es->outlook }}" required>
											</div>
										  </div><br>

										  
										  <div class="row">
											<div class="col">
											  <label for="inputName" class="control-label">direction</label>
											  <input type="hidden" name="direction" value="{{ $es->direction }}">
											  <input type="text" class="form-control" id="inputName" name="direction"
											  value="{{ $es->direction }}" required>
											</div>
										  </div><br>
				
										  <div class="row">
											<div class="col">
											  <label for="inputName" class="control-label">floor</label>
											  <input type="hidden" name="floor" value="{{ $es->floor }}">
											  <input type="text" class="form-control" id="inputName" name="floor"
											  value="{{ $es->floor }}" required>
											</div>
										  </div><br>
				
										  <div class="row">
											<div class="col">
											  <label for="inputName" class="control-label">ownership</label>
											  <input type="hidden" name="ownership" value="{{ $es->ownership }}">
											  <input type="text" class="form-control" id="inputName" name="ownership"
											  value="{{ $es->ownership }}" required>
											</div>
										  </div><br>
				
										  <div class="row">
											<div class="col">
											  <label for="inputName" class="control-label">room number</label>
											  <input type="hidden" name="room_number" value="{{ $es->room_number }}">
											  <input type="text" class="form-control" id="inputName" name="room_number"
											  value="{{ $es->room_number }}" required>
											</div>
										  </div><br>
				
										  <div class="row">
											<div class="col">
											  <label for="inputName" class="control-label">bath number</label>
											  <input type="hidden" name="bath_number" value="{{ $es->bath_number }}">
											  <input type="text" class="form-control" id="inputName" name="bath_number"
											  value="{{ $es->bath_number }}" required>
											</div>
										  </div><br>
				
										  <div class="row">
											<div class="col">
											  <label for="inputName" class="control-label">price</label>
											  <input type="hidden" name="price" value="{{ $es->price }}">
											  <input type="text" class="form-control" id="inputName" name="price"
											  value="{{ $es->price }}" required>
											</div>
										  </div><br>

										  <div class="row">
											<div class="col">
											  <label for="exampleTextarea">description</label>
											  <input type="hidden" name="description" value="{{ $es->description }}">
											  <textarea class="form-control" id="exampleTextarea" name="description" rows="3">
											  {{ $es->description }}</textarea>
											</div>
										  </div><br>
	
			
										  <div class="form-check">
											<input class="form-check-input" type="checkbox" name="parking" value="1" id="flexCheckChecked" {{ $es->parking == 1 ? 'checked' : '' }}>
											<label class="form-check-label" for="parking">
												parking
											 </label>
										  </div>
	
										  <div class="form-check">
											<input class="form-check-input" type="checkbox" name="place_for_barbecue" value="1" id="flexCheckChecked" {{ $es->place_for_barbecue == 1 ? 'checked' : '' }}>
											<label class="form-check-label" for="place_for_barbecue">
												place for barbecue
											 </label>
										  </div>

									  <div class="form-check">
										<input class="form-check-input" type="checkbox" name="left" value="1" id="flexCheckChecked" {{ $es->left == 1 ? 'checked' : '' }}>
										<label class="form-check-label" for="left">
											left
								 		</label>
									  </div>
	
									  <div class="form-check">
										<input class="form-check-input" type="checkbox" name="TV_cable" value="1" id="flexCheckChecked" {{ $es->TV_cable == 1 ? 'checked' : '' }}>
										<label class="form-check-label" for="TV_cable">
											TV cable
										</label>
									  </div>

										<div class="form-check">
										  <input class="form-check-input" type="checkbox" name="internet" value="1" id="flexCheckChecked" {{ $es->internet == 1 ? 'checked' : '' }}>
										  <label class="form-check-label" for="internet">
											internet
										  </label>
										</div>

										  <div class="form-check">
										  <input class="form-check-input" type="checkbox" name="central_heating" value="1" id="flexCheckChecked" {{ $es->central_heating == 1 ? 'checked' : '' }}>
										  <label class="form-check-label" for="central_heating">
											  central_heating
										  </label>
										  </div>

										<div class="row">
											<div class="col">
											  <label for="inputName" class	="control-label">slug</label>
											  <input type="hidden" name="slug" value="{{ $es->slug }}">
											  <input type="text" class="form-control" id="inputName" name="slug"
											  value="{{ $es->slug }}" required>
											</div>
										  </div><br>
										  <div class="col-lg-5 single-list-page">
											<div class="related-properties">
									
												<div id="gallery">
													@foreach ($es->images as $key => $img)
														<div class="image-constainer">
															<form method="POST" enctype="multipart/form-data"  action="{{ route('estate.update', $es->id) }}">
																@csrf
																@method('PUT')
																<a href="javascript:void(0);" class="trigger-upload" data-target="image-upload-{{ $img->id }}">
																	<img src="{{ asset('images/' . $img->image_name) }}" alt="Estate Image" class="image-item" />
																</a>
																<input type="file" id="image-upload-{{ $img->id }}" name="image_name_{{ $img->id }}" style="display:none;"/>
																<label for="image-upload-{{ $img->id }}" class="update-button"
																	   style="display: block;
																			  text-align: top;
																			  padding: 5px 10px;
																			  background-color: #30caa0;
																			  color: #fff;
																			  cursor: pointer;">Update Image</label>
															</form>
														</div>
													@endforeach
												</div>

										<div class="d-flex justify-content-center">
											<button type="submit" class="btn btn-primary" >Update</button>
										</div>
				
									</form>

								
								</div>
							</div>
						</div>
					</div>
					<!-- row closed -->
	
	<!-- Breadcrumb -->
	

	<!-- Page -->
	
	
	<!-- Page end -->


	<!-- Clients section -->
	<div class="clients-section">
		<div class="container">
			<div class="clients-slider owl-carousel">
				<a href="#">
					<img src="{{asset('img/partner/1.png')}}" alt="">
				</a>
				<a href="#">
					<img src="{{asset('img/partner/2.png')}}" alt="">
				</a>
				<a href="#">
					<img src="{{asset('img/partner/3.png')}}" alt="">
				</a>
				<a href="#">
					<img src="{{asset('img/partner/4.png')}}" alt="">
				</a>
				<a href="#">
					<img src="{{asset('img/partner/5.png')}}" alt="">
				</a>
			</div>
		</div>
	</div>
	<!-- Clients section end -->


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
	
{{-- 
    <script>
	$(document).on('click', '.trigger-upload', function() {
		var targetId = $(this).data('target');
		$('#' + targetId).click();
	});
	</script>  --}}

	<script>
	$(document).on('click', '.trigger-upload', function() {
		var targetId = $(this).data('target');
		$('#' + targetId).trigger('click');
	  });
	  </script>

{{-- 
<script>
	$(document).ready(function() {
		$('.update-button').click(function() {
		  $(this).prev('input[type="file"]').click();
		});
		
		// Show the selected image file name
		$('input[type="file"]').change(function() {
		  var fileName = $(this).val().split('\\').pop();
		  $(this).next('label').text(fileName);
		});
	  });
	  
	</script> --}}

                                        
	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
	<script src="{{asset('js/magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>


	<!-- load for map -->
	<script src="{{asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo')}}"></script>
	<script src="{{asset('js/map-2.js')}}"></script>
	<button onclick="openPopup()">Edit</button>
  

</body>
</html>
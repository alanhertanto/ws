<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="{{asset("favicon.ico")}}">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Bootstrap CSS -->
	<link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="{{asset("css/tiny-slider.css")}}" rel="stylesheet">
	<link href="{{asset("css/style.css")}}" rel="stylesheet">
	<link href="css/card_gallery.css" rel="stylesheet">
	<title>WorkinStudio </title>
	<style>
		.sameImage {
			object-fit: cover;
			/* Ensures the image covers the element while maintaining aspect ratio */
		}
	</style>
</head>

<body>

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

		<div class="container">
			<a class="navbar-brand" href="/">Workin<span>Studio</span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
				aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item ">
						<a class="nav-link" href="/">Home</a>
					</li>
					@auth
						@if (Auth::user()->role == 'Freelancer')
							<li><a class="nav-link" href="/find-job">Find Work</a></li>
						@endif
					@endauth
					@auth
						@if (Auth::user()->role == 'Client')
							<li><a class="nav-link" href="/job">Find Talent</a></li>
						@endif
					@endauth
					<li><a class="nav-link" href="/blog">Blog</a></li>
					@auth
						@if (Auth::user()->role !== null)
							<li class=""><a class="nav-link" href="/chat">Chat</a></li>
						@endif
					@endauth
					<li><a class="nav-link active" href="/about">About Us</a></li>
					@auth
						@if (Auth::user()->role !== null)
							<li><a class="nav-link" href="/logout">Logout</a></li>
						@endif
					@endauth
					@guest
						<li><a class="nav-link" href="/login">Login</a></li>
					@endguest

				</ul>
			</div>
		</div>

	</nav>
	<!-- End Header/Navigation -->

	<!-- Start Hero Section -->
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-8">
					<div class="intro-excerpt">
						<h1>Work In <span class="d-block">Flexibility</span></h1>
						<p class="mb-4">Empower Your Creativity with WorkInStudio: Where Flexibility Drives Success.
							Join a vibrant community tailored to freelancers, entrepreneurs, and remote teams.
							Experience the freedom to work on your terms, anytime, anywhere. Fuel your passion,
							collaborate effortlessly, and thrive in a flexible environment designed for your success.
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="hero-img-wrap">
						<img src="images/working-man.png" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->

	<!-- Start Product Section -->
	<div class="product-section">
		<div class="container">
			<div class="row">
				<!-- Start Column Top -->
				<div class="col-md-12 col-lg-12">
					<h2 class="mb-2 section-title text-center">Our Location.</h2>
				</div>
				<!-- End Column Top -->
				<iframe
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254.07037474377805!2d106.89726011460486!3d-6.225446140495471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f34529ef8015%3A0x1478c59eb6702545!2sQVFX%2BR27%2C%20RT.2%2FRW.2%2C%20Pondok%20Bambu%2C%20Durensawit%2C%20East%20Jakarta%20City%2C%20Jakarta%2013430!5e0!3m2!1sen!2sid!4v1719756066060!5m2!1sen!2sid"
					width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"></iframe> <!-- End Column 5 -->
				<div class="col-12 col-md-4 col-lg-1 mb-5 mb-md-0">
					<span></span>
				</div>

				<!-- Start Why Choose Us Section -->
				<div class="why-choose-section">
					<div class="container">
						<div class="row justify-content-between">
							<div class="col-lg-8">
								<div class="row my-4">
									<h2 class="section-title text-center">How To Contact Us?</h2>
									<span class="gap-20"></span><br>
									<span class="fa fa-brands fa-solid fa-phone"> (+62) 87722437989</span><br>
									<a href="https://www.instagram.com/workinstudio.official/" target="_blank"><span
												class="fa fa-brands fa-instagram">workinstudio.official</span></a><br>
									<a href="https://www.linkedin.com/company/workin-studio/" target="_blank"><span
												class="fa fa-brands fa-linkedin">Workin Studio</span></a>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="img-wrap">
									<img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- End Why Choose Us Section -->

			</div>
		</div>
	</div>
	<!-- End Vertically -->
	@include('footer')
</body>

</html>
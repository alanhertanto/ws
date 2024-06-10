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
				<div class="col-md-12 col-lg-12 mb-5 mb-lg-5">
					<h2 class="mb-4 section-title text-center">Our Services.</h2>
					<p class="mb-4 text-center"><b>Dengan dedikasi yang tak tertandingi dan pengalaman yang luas, kami
							berkomitmen untuk memberikan solusi terbaik bagi klien kami.</b></p>
				</div>
				<!-- End Column Top -->

				<div class="col-12 col-md-4 col-lg-1 mb-5 mb-md-0">
					<span></span>
				</div>
				<!-- Start Column 1 -->
				<div class="col-12 col-md-4 col-lg-2 mb-5 mb-md-0">
					<a class="product-item" data-bs-toggle="modal" data-bs-target="#modalMentoring">
						<img src="images/mentoring.jpg" class="img-fluid product-thumbnail">
						<h3 class="product-title">Mentoring</h3>
						<strong class="product-price">Learn More</strong>

						<span class="icon-cross">
							<img src="images/cross.svg" class="img-fluid">
						</span>
					</a>
				</div>
				<!-- End Column 1 -->

				<!-- Start Column 2 -->
				<div class="col-12 col-md-4 col-lg-2 mb-5 mb-md-0">
					<a class="product-item" data-bs-toggle="modal" data-bs-target="#modalWebinar">
						<img src="images/webinar.jpg" class="img-fluid product-thumbnail">
						<h3 class="product-title">Webinar</h3>
						<strong class="product-price">Learn more</strong>

						<span class="icon-cross">
							<img src="images/cross.svg" class="img-fluid">
						</span>
					</a>
				</div>
				<!-- End Column 2 -->

				<!-- Start Column 3 -->
				<div class="col-12 col-md-4 col-lg-2 mb-5 mb-md-0">
					<a class="product-item" data-bs-toggle="modal" data-bs-target="#modalCommunity">
						<img src="images/community-support.jpg" class="img-fluid product-thumbnail">
						<h3 class="product-title">Community Support</h3>
						<strong class="product-price">Learn More</strong>

						<span class="icon-cross">
							<img src="images/cross.svg" class="img-fluid">
						</span>
					</a>
				</div>
				<!-- End Column 3 -->

				<!-- Start Column 4 -->
				<div class="col-12 col-md-4 col-lg-2 mb-5 mb-md-0">
					<a class="product-item" data-bs-toggle="modal" data-bs-target="#modalKOL">
						<img src="images/kol-support.jpg" class="img-fluid product-thumbnail">
						<h3 class="product-title">KOL Support</h3>
						<strong class="product-price">Learn More</strong>

						<span class="icon-cross">
							<img src="images/cross.svg" class="img-fluid">
						</span>
					</a>
				</div>
				<!-- End Column 4 -->
				<!-- Start Column 5 -->
				<div class="col-12 col-md-4 col-lg-2 mb-5 mb-md-0">
					<a class="product-item" data-bs-toggle="modal" data-bs-target="#modalPembicara">
						<img src="images/pembicara.jpg" class="img-fluid product-thumbnail">
						<h3 class="product-title">Pembicara</h3>
						<strong class="product-price">Learn More</strong>

						<span class="icon-cross">
							<img src="images/cross.svg" class="img-fluid">
						</span>
					</a>
				</div>
				<!-- End Column 5 -->
				<div class="col-12 col-md-4 col-lg-1 mb-5 mb-md-0">
					<span></span>
				</div>


			</div>
		</div>
	</div>
	<!-- End Product Section -->
	<!-- Vertically centered scrollable modal -->
	<div class="modal fade" id="modalMentoring" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content text-dark">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><b>Mentoring Services</b></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body font-weight-normal">
					Kami memiliki jejaring dan talent yang telah tersertifikasi BNSP ataupun sertifikasi keahlian yang
					telah diakui dalam/luar negeri. Diantara mentoring yang kami sediakan yaitu :
					<ul>
						<li>
							Mentoring UMKM
							<ul>
								<li>
									Pendampingan Hallal
								</li>
								<li>
									Mentor Digital Enterpreneur
								</li>
								<li>
									Legalitas
								</li>
							</ul>
						</li>
						<li>
							Mentoring Kepenulisan
							<ul>
								<li>SEO (Search Engine Optimization)</li>
								<li>Copywriting</li>
								<li>Dll</li>
							</ul>
						</li>
						<li>
							Mentoring untuk <i>Skill Up</i> di dunia digital Freelancer
						</li>
					</ul>
					Layanan mentoring ini memiliki rate card berbeda tergantung pilihan mentorship dan pelaksanaan
					<i>Online/Offline.</i> <br>
					<b>
						Rate harga Rp.150.000 - Rp.1.500.000 / 1x pertemuan
					</b>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<a href="https://wa.me/+62859106932912?text=Hai Saya Tertarik Dengan Servis Mentoring Dari Workin Studio!"
						target="_blank">
						<button type="button" class="btn btn-primary" link>Hubungi Kami</button>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End Vertically -->
	<!-- Vertically centered scrollable modal -->
	<div class="modal fade" id="modalWebinar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content text-dark">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><b>Webinar Services</b></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body font-weight-normal">
					Layanan Webinar ini berisi berbagai macam tema dengan ruang lingkup peningkatan Skill Digital,
					Sarana dan Tools untuk Freelancer, serta Bisnis. <br>
					<b>Rate harga : Rp. 50.000 - Rp. 500.000 / Sesi</b>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<a href="https://wa.me/+62859106932912?text=Hai Saya Tertarik Dengan Servis Webinar Dari Workin Studio!"
						target="_blank">
						<button type="button" class="btn btn-primary" link>Hubungi Kami</button>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End Vertically -->
	<!-- Vertically centered scrollable modal -->
	<div class="modal fade" id="modalCommunity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content text-dark">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><b>Community Support</b></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body font-weight-normal">
					Layanan ini berisi dukungan komunitas untuk berbagai kebutuhan seperti akuisisi produk hingga
					visitasi event. <br>
					<b>Rate harga : Rp. 50.000 - Rp. 500.000 / Sesi</b>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<a href="https://wa.me/+62859106932912?text=Hai Saya Tertarik Dengan Servis Community Support Dari Workin Studio!"
						target="_blank">
						<button type="button" class="btn btn-primary" link>Hubungi Kami</button>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End Vertically -->
	<!-- Vertically centered scrollable modal -->
	<div class="modal fade" id="modalKOL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content text-dark">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><b>KOL Support</b></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body font-weight-normal">
					Menjadi fokus Layanan Kami dalam mendukung berbagai Campaign dengan berbagai Tier KOL <br>
					<ul>
						<li>Nano <b>Rate: Rp. 150.000 / Talent</b></li>
						<li>Micro <b>Rate: Rp. 250.000 / Talent</b></li>
						<li>Mid Tier <b>Rate: Rp. 350.000 / Talent</b></li>
						<li>Macro <b>Rate: Rp. 500.000 - Rp. 1.500.000 / Talent</b></li>
						<li>Mega <b>Rate: Rp. 2.000.000 - Rp. 10.000.000 / Talent</b></li>
					</ul>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<a href="https://wa.me/+62859106932912?text=Hai Saya Tertarik Dengan Servis KOL Support Dari Workin Studio!"
						target="_blank">
						<button type="button" class="btn btn-primary" link>Hubungi Kami</button>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End Vertically -->
	<!-- Vertically centered scrollable modal -->
	<div class="modal fade" id="modalPembicara" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content text-dark">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><b>Pembicara</b></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body font-weight-normal">
					Kami memiliki berbagai talent profesional di berbagai bidang yang memiliki portofolio mumpuni untuk
					menjadi pengisi acara. <br>
					<b>Rate harga Rp.300.000 - Rp.5.000.000 / talent</b>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<a href="https://wa.me/+62859106932912?text=Hai Saya Tertarik Dengan Servis KOL Support Dari Workin Studio!"
						target="_blank">
						<button type="button" class="btn btn-primary" link>Hubungi Kami</button>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End Vertically -->
	<!-- Start Why Choose Us Section -->
	<div class="why-choose-section">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-8">
					<h2 class="section-title text-center">Visi Workin Studio</h2>
					<p class="text-center">Menjadi perusahaan agensi tenaga kerja paruh waktu yang kompeten dan
						berintegritas, <br> baik bekerja secara online/offline.</p>
					<div class="row my-4">
						<h2 class="section-title text-center">Misi Workin Studio</h2>
						<span class="gap-20"></span>
						<div class="col-4 col-md-4">
							<div class="feature">
								<h3>Membuat Pelatihan Peningkatan Skill</h3>
								<p>Kami mengerti pentingnya investasi dalam pengembangan karyawan. Dengan solusi
									pelatihan disesuaikan, kami meningkatkan kompetensi dan produktivitas. Dari analisis
									ke penyampaian materi pelatihan, tim ahli kami membantu merancang program efektif.
								</p>
							</div>
						</div>

						<div class="col-4 col-md-4">
							<div class="feature">
								<h3>Branding Talent</h3>
								<p>Dalam era digital, Branding Talent kunci kesuksesan karier. Kami paham betapa
									pentingnya citra personal yang kuat.
									Dengan pendekatan inovatif, kami membantu Anda merancang strategi branding unik,
									dari identitas visual hingga manajemen media sosial, memperkuat kehadiran Anda
									secara online dan offline.</p>
							</div>
						</div>

						<div class="col-4 col-md-4">
							<div class="feature">
								<h3>Bermitra Dengan Perusahaan Lain</h3>
								<p>Kami paham pentingnya kemitraan dalam bisnis. Dengan solusi kemitraan yang
									disesuaikan, kami optimalisasi kolaborasi. Dari peluang hingga negosiasi, tim kami
									siap merancang strategi. Hubungi kami untuk memperluas jangkauan bisnis Anda.</p>
							</div>
						</div>
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

	<!-- Start Gallery Slider -->
	<div class="product-section	 galleryfilter">
		<h2 class="mb-4 section-title text-center">Kegiatan dan Aktivitas Terbaru Kami</h2>
		<!-- Portfolio Gallery Grid -->
		<div class="row galleryfilter">
			<div class="column nature">
				<div class="content sameImage">
					<img src="/images/sertifikasi.jpg" style="width:100%">
					<h4>Certification BNSP of CTWM (Certified Teamwork Management)</h4>
				</div>
			</div>
			<div class="column nature">
				<div class="content sameImage">
					<img src="/images/jakartasmartcity.jpg" style="width:100%">
					<h4>Comunity Visit Jakarta Smart City Lab</h4>
				</div>
			</div>
			<div class="column nature">
				<div class="content sameImage">
					<img src="/images/hicool2024.jpg" style="width:100%">
					<h4>Digital start-up gathering & networking Hicool 2024</h4>
				</div>
			</div>
			<div class="column cars">
				<div class="content sameImage">
					<img src="/images/bealeaf.jpg" style="width:100%">
					<h4>Talkshow-BeaLeaf</h4>
				</div>
			</div>
			<div class="column cars">
				<div class="content sameImage">
					<img src="/images/yotnc.jpg" style="width:100%">
					<h4>YOTNC young on top nasional conference</h4>
				</div>
			</div>
			<!-- END GRID -->
		</div>
	</div>
	<!-- End Gallery Slider -->

	<!-- Start client Slider -->
	<div class="client-section mb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 mx-auto text-center">
					<h2 class="section-title">Penghargaan Kami</h2>
				</div>
				<div class="col-lg-6 mx-auto text-center">
					<h2 class="section-title">Client Kami</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-6">
				<div id="testimonial-nav">
							<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
							<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
						</div>

					<div class="testimonial-slider-wrap text-center">
						<div class="testimonial-slider">
							@foreach ($achievements as $achievement)
								<div class="item">
									<div class="col-lg-8 mx-auto">
										<div class="testimonial-block text-center">
											<div class="author-info">
												<div class="author-pic">
													<img src="images/achievement/{{$achievement->foto}}" class="img-fluid">
												</div>
												<h3 class="font-weight-bold">{{$achievement->nama}}</h3>
												<span class="position d-block mb-3">{{$achievement->tanggal}}</span>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="client-slider-wrap text-center">

						<div id="client-nav">
						</div>
						<div class="client-slider">
							@foreach ($clients as $client)
								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">
											<div class="client-block text-center">
												<div class="author-info">
													<div class="author-pic">
														<img src="images/client/{{$client->foto}}" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">{{$client->nama}}</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
	<!-- End client Slider -->
	@include('footer')
</body>

</html>
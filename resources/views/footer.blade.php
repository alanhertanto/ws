<!-- Start Footer Section -->
<footer class="footer-section">
		<div class="container relative">

			<div class="sofa-img">
				<img src="{{asset('images/WokaWoki.png')}}" alt="Image" class="img-fluid">
			</div>

			<div class="row g-5 mb-5">
				<div class="col-lg-6">
					<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Hubungi Kami<span>.</span></a>
					</div>
					<p class="mb-4">Jalan Gotong Royong RT 1 RW 2, Pondok Bambu, Duren Sawit, Kota Jakarta Timur, No. GT
						20, Daerah Khusus Ibukota Jakarta, 13430</p>

					<ul class="list-unstyled custom-social">
						<li><a href=""><span class="fa fa-brands fa-solid fa-phone"></span></a></li>
						<li><a href=""><span class="fa fa-brands fa-solid fa-envelope"></span></a></li>
						<li><a href="https://www.instagram.com/workinstudio.official/" target="_blank"><span
									class="fa fa-brands fa-instagram"></span></a></li>
						<li><a href="https://www.linkedin.com/company/workin-studio/" target="_blank"><span
									class="fa fa-brands fa-linkedin"></span></a></li>
					</ul>
				</div>

				<div class="col-lg-6">
					<div class="row links-wrap">
						<div class="col-4 col-sm-4 col-md-4">
							<ul class="list-unstyled">
							</ul>
						</div>

						<div class="col-4 col-sm-4 col-md-4">
							<ul class="list-unstyled">
								<li><a href="#">Support</a></li>
								<li><a href="#">Knowledge base</a></li>
								<li><a href="#">Live chat</a></li>
							</ul>
						</div>

						<div class="col-4 col-sm-4 col-md-4">
							<ul class="list-unstyled">
							</ul>
						</div>

					</div>
				</div>

			</div>

			<div class="border-top copyright">
				<div class="row pt-4">
					<div class="col-lg-6">
						<p class="mb-2 text-center text-lg-start">Copyright &copy;
							<script>document.write(new Date().getFullYear());</script>. All Rights Reserved.
							<!-- License information: https://untree.co/license/ -->
						</p>
					</div>

				</div>
			</div>

		</div>
	</footer>
	<!-- End Footer Section -->

	<script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('js/tiny-slider.js')}}"></script>
	<script src="{{ asset('js/custom.js')}}"></script>
	<script src="{{ asset('js/card.gallery.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>
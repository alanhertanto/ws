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
    <title>WorkinStudio </title>
    <style>
        .payment-type .payment-fields-milestone {
            display: none;
        }

        .payment-type .payment-fields-hourly {
            display: none;
        }

        .payment-type .payment-fields-project {
            display: none;
        }


        .payment-type input[value="Milestone"]:checked~.payment-fields-milestone {
            display: block;
        }

        .payment-type input[value="Hourly"]:checked~.payment-fields-hourly {
            display: block;
        }

        .payment-type input[value="Project"]:checked~.payment-fields-project {
            display: block;
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
                    <li class="">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    @auth
                        @if (Auth::user()->role == 'Freelancer')
                            <li><a class="nav-link" href="/find-job">Find Work</a></li>
                        @endif
                    @endauth
                    @auth
                        @if (Auth::user()->role == 'Client')
                            <li class="nav-item active"><a class="nav-link" href="/job">Find Talent</a></li>
                        @endif
                    @endauth
                    <li><a class="nav-link" href="/blog">Blog</a></li>
                    <li><a class="nav-link" href="/about">About Us</a></li>
                    @auth
                        @if (Auth::user()->role !== null)
                            <li><a class="nav-link" href="/logout">Logout</a></li>
                        @endif
                    @endauth
                    @auth
                        @if (Auth::user()->role == null)
                            <li><a class="nav-link" href="/login">Login</a></li>
                        @endif
                    @endauth

                </ul>
            </div>
        </div>

    </nav>
    <!-- End Header/Navigation -->

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
            <div class="col-12 sm-12 mb-4 mb-5">
                    <a href="/job" class="btn btn-secondary">Kembali</a>
                </div>

            <div class="col-lg-12">
                    <div class="intro-excerpt">
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1>Post Your Job For Our Talents</h1>
                        <form action="{{ route('job.PostJob') }}" method="post" class="text-white"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="projectName" class="form-label">Project Name</label>
                                <input type="text" class="form-control" id="projectName" name="projectName"
                                    placeholder="Your Project Name...">
                            </div>
                            <div class="mb-3">
                                <label for="projectDescription" class="form-label">Project Description</label>
                                <textarea class="form-control" id="projectDescription" name="projectDescription"
                                    rows="5"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="projectFile" class="form-label">Additional File</label>
                                <input class="form-control no-height" type="file" id="projectFile" name="projectFile">
                            </div>
                            <div class="mb-6 payment-type">
                                <h6 class="form-label">Jenis Pembayaran</h6>
                                <input class="form-check-input" type="radio" name="paymentType" id="inlineRadio1"
                                    value="Hourly">
                                <label class="form-check-label" for="inlineRadio1">Per-Jam</label>
                                <span>&nbsp;</span>
                                <input class="form-check-input" type="radio" name="paymentType" id="inlineRadio2"
                                    value="Project">
                                <label class="form-check-label" for="inlineRadio2">Project Based</label>
                                <span>&nbsp;</span>
                                <input class="form-check-input" type="radio" name="paymentType" id="inlineRadio3"
                                    value="Milestone">
                                <label class="form-check-label" for="inlineRadio3">Milestone</label>

                                <div class="mb6 payment-fields-milestone">
                                    <label for="25perPayment" class="form-label">25%</label>
                                    <input type="number" class="form-control" id="25perPayment" name="25perPayment"
                                        placeholder="Price" value="0">
                                    <label for="50perPayment" class="form-label">50%</label>
                                    <input type="number" class="form-control" id="50perPayment" name="50perPayment"
                                        placeholder="Price" value="0">
                                    <label for="75perPayment" class="form-label">75%</label>
                                    <input type="number" class="form-control" id="75perPayment" name="75perPayment"
                                        placeholder="Price" value="0">
                                    <label for="100perPayment" class="form-label">100%</label>
                                    <input type="number" class="form-control" id="100perPayment" name="100perPayment"
                                        placeholder="Price" value="0">
                                </div>
                                <div class="mb-6 payment-fields-project">
                                    <label for="minimumPayment" class="form-label">Minimmum</label>
                                    <input type="number" class="form-control" id="minimumPayment" name="minimumPayment"
                                        placeholder="Minimum Price" value="0">
                                    <label for="maximumPayment" class="form-label">Maximum</label>
                                    <input type="number" class="form-control" id="maximumPayment" name="maximumPayment"
                                        placeholder="Maximum Price" value="0">
                                </div>

                                <div class="mb-6 payment-fields-hourly">
                                    <label for="hourlyPayment" class="form-label">Hourly Rate</label>
                                    <input type="number" class="form-control" id="hourlyPayment" name="hourlyPayment"
                                        placeholder="Hourly Price" value="0">
                                </div>
                                <input type="hidden" name="clientId" value="{{ session('user_id') }}">
                                <div class="mb-3 mt-5">
                                    <button class="btn btn-secondary" id="jobPosting">Post The Job</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    @include('footer')

  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
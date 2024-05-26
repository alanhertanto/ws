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
    <link rel="shortcut icon" href="favicon.ico">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>WorkinStudio </title>
    <style>
        #modal-nav {
            max-width: 100vw;
            margin: 0;
            height: 100vh;
        }

        #modal-nav .modal-content {
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .modal {
            padding: 0 !important;
        }

        .modal .fsd5 {
            font-size: 0.5vw;
        }

        .modal .fsd6 {
            font-size: 0.6vw;
        }

        .modal .fsd7 {
            font-size: 0.7vw;
        }

        .modal .fsd8 {
            font-size: 0.8vw;
        }

        .modal .fsd9 {
            font-size: 0.9vw;
        }

        .modal .fs1 {
            font-size: 1vw;
        }

        .modal .fs1d5 {
            font-size: 1.1vw;
        }

        .modal .fs1d2 {
            font-size: 1.2vw;
        }

        .modal .fs1d3 {
            font-size: 1.3vw;
        }

        .modal .fs1d4 {
            font-size: 1.4vw;
        }

        .modal .fs1d5 {
            font-size: 1.5vw;
        }

        .modal .nounderline {
            text-decoration: none;
        }

        .noborder {
            border: none;
            border-radius: 0;
        }

        .nobg {
            background-color: inherit;
        }

        @media only screen and (min-width: 768px) {
            #modal-nav {
                max-width: 50vw !important;
                margin-left: auto;
            }
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
                            <li class="nav-item active"><a class="nav-link" href="/find-job">Find Work</a></li>
                        @endif
                    @endauth
                    @auth
                        @if (Auth::user()->role == 'Client')
                            <li class=""><a class="nav-link" href="/find-job">Find Talent</a></li>
                        @endif
                    @endauth
                    <li class=""><a class="nav-link" href="/blog">Blog</a></li>
                    <li class=""><a class="nav-link" href="/about">About Us</a></li>
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
                <div class="col-lg-8">
                    <div class="intro-excerpt">
                        <h1>Work In <span class="d-block">Flexibility</span></h1>
                        <h2>Find Your Passion On Our Projects</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Blog Section -->
    <div class="blog-section">
        <div class="container">
            <div class="row">
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
                @forelse ($jobs as $job)
                            <div class="col-12 col-sm-6 col-md-4 mb-5" onclick="openModal('{{$job->id}}')">
                                <div class="post-entry">
                                    <h2>{{$job->projectName}}</h2>
                                    <div class="post-content-entry">
                                        <p>Posted {{$job->timeAgo}}</p>
                                        <p class="lead">{{$job->projectDescription}} </p>
                                        <p class="text-capitalize small">
                                            Tipe {{$job->paymentType}}
                                            | Est. @if($job->paymentType == 'Hourly')
                                                {{$job->hourlyPayment}}
                                            @elseif($job->paymentType == 'Project')
                                                                        @php
                                                                            echo ($job->minimumPayment + $job->maximumPayment) / 2;
                                                                        @endphp
                                            @elseif($job->paymentType == 'Milestone')
                                                                        @php
                                                                            echo ($job->per25Payment + $job->per50Payment + $job->per75Payment + $job->per100Payment);
                                                                        @endphp
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                @empty
                    <div class="alert alert-danger">
                        Belum Ada Projects.
                    </div>
                @endforelse
            </div>
            {{ $jobs->links() }}
            <div id="myModal{{$job->id}}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel{{$job->id}}" aria-hidden="true">
                <div class="modal-dialog modal-lg" id="modal-nav">
                    <div class="modal-content">
                        <div class="row px-4 mt-4">
                            <div class="col-8">
                                <a href="#" data-bs-dismiss="modal"><i
                                        class="fa-solid fa-arrow-left-long fs1d5"></i></a>
                            </div>
                            <div class="col-3">
                                <a href="#" target="_blank" class="d-flex justify-content-center nounderline"><i
                                        class="fa-solid fa-arrow-right-to-bracket fs1d2"></i>&emsp;<span
                                        class="fsd8 text-center">Buka Di Tab Baru</span></a>
                            </div>
                        </div>
                        <div class="modal-body row ms-1 mt-2">
                            <div class="col-md-8 px-2">
                                <h1 class="display-5">{{$job->projectName}}</h1>
                                <p class="fsd7">Posted {{$job->timeAgo}}</p>
                                <hr>
                                <p class="fs1">{{$job->projectDescription}}</p>
                                <hr>
                                <div class="row px-2 pt-2">
                                    <div class="col-sm-6">
                                        <p class="fsd8"><i class="fa-solid fa-money-check-dollar fs1"></i>
                                            {{$job->paymentType}}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="fsd8"><i class="fa-solid fa-magnifying-glass-dollar fs1"></i> Est.
                                            @if($job->paymentType == 'Hourly')
                                                {{$job->hourlyPayment}}
                                            @elseif($job->paymentType == 'Project')
                                                                                        @php
                                                                                            echo ($job->minimumPayment + $job->maximumPayment) / 2;
                                                                                        @endphp
                                            @elseif($job->paymentType == 'Milestone')
                                                                                        @php
                                                                                            echo ($job->per25Payment + $job->per50Payment + $job->per75Payment + $job->per100Payment);
                                                                                        @endphp
                                            @endif
                                        </p>
                                    </div>

                                </div>

                                <hr>
                                <p class="fs1"><strong>Attachment</strong></p>
                                <p class="fsd8"><i class="fa-solid fa-paperclip fs1"></i> <a
                                        href="{{ route('download.file', ['projectName' => $job->projectName, 'filename' => $job->projectFile]) }}"
                                        target="_blank">
                                        {{ strlen($job->projectFile) > 12 ? substr($job->projectFile, 0, 12) . '...' : $job->projectFile }}
                                    </a>
                                </p>
                                <hr>
                                <!-- Bid Project -->
                                <p class="fs1"><strong>Bid Project Ini</strong></p>
                                <p class="fsd8"><strong>Rate Yang Akan Diajukan Untuk Pekerjaan Ini</strong></p>
                                <form action="{{ route('bid.bidJob') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="projectId" value="{{ $job->id }}">
                                    <!-- Other form fields -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="fs1"><strong>Rates</strong></span><br>
                                        </div>
                                        <div class="col-md-6 p">
                                            <input type="number" class="form-control no-height" value="0" id="rates"
                                                name="rates" onchange="feeRates()">
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs7"><strong>Potongan Jasa 10%</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="readonly" class="noborder nobg" value="" id="feeDeduction"
                                                disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs7"><strong>Total Rate</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="readonly" class="noborder nobg" value="" id="feeTotal"
                                                disabled>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="fs1"><strong>Pitching (Opsional)</strong></p>
                                    <span class="fsd7">Tahukah Anda? Pitching Yang Baik Akan Meyakinkan Calon Client
                                        Anda!</span>
                                    <textarea class="form-control fsd6" rows="20" name="bidPitch"></textarea>
                                    <span class="fsd7"><strong>Attachment</strong></span>
                                    <input type="file" class="form-control no-height" id="inputGroupFile02"
                                        name="bidPitchFile">
                                    <hr>
                                    <p class="fs1"><strong>Partisipan</strong></p>
                                    <p class="fsd8">Proposal Terkirim : {{$submittedCount}}</p>
                                    <p class="fsd8">Dalam Interview : {{$interviewCount}}</p>
                                    <hr>
                                    <input type="hidden" name="userId" value="{{ session('user_id') }}">
                                    <div class="mb-3 mt-5">
                                        @if($hasBid[$job->id])
                                            <button class="btn btn-success" disabled>Sudah Di Submit</button>
                                        @else
                                            <button class="btn btn-secondary" id="jobPosting">Bid Job</button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                            <div class="vr p-0"></div>
                            <div class="col-md-3">
                                <div class="px-2">
                                    <div class="clientInfo">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Section -->

    @include('footer')

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function openModal(jobId) {
            $('#myModal' + jobId).modal('toggle'); // Toggle the modal visibility
        }

        function feeRates() {
            var fee = $('#rates').val();
            var feeDeduction = ((fee * 10 / 100));
            $('#feeDeduction').val(feeDeduction);
            var totalFee = fee - feeDeduction;
            $('#feeTotal').val(totalFee);
        }
    </script>


</body>

</html>
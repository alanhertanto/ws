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
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="active"><a class="nav-link" href="/find-job">Find Work</a></li>
                    <li><a class="nav-link" href="/job">Find Talent</a></li>
                    <li><a class="nav-link" href="/blog">Blog</a></li>
                    <li><a class="nav-link" href="/about">About Us</a></li>
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
                @forelse ($jobs as $job)
                    <div class="col-12 col-sm-6 col-md-4 mb-5" onclick="openModal('{{$job->id}}')">
                        <div class="post-entry">
                            <h2>{{$job->projectName}}</h2>
                            <div class="post-content-entry">
                                <p>Posted {{$job->timeAgo}}</p>
                                <p class="lead">{{$job->projectDescription}}</p>
                                <p class="text-capitalize small">{{$job->paymentType}}</p>
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
                        <div class="modal-body row">
                            <div class="col-md-8">
                                <h1>{{$job->projectName}}</h1>
                                <p>Posted {{$job->timeAgo}}</p>
                            </div>
                            <div class="vr"></div>
                            <div class="col-md-3">
                                Nanti Client Ada Disini
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
    </script>


</body>

</html>
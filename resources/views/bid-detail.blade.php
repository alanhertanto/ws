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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("css/tiny-slider.css")}}" rel="stylesheet">
    <link href="{{asset("css/style.css")}}" rel="stylesheet">
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
            <a href="/job" class="btn btn-success">Back</a>
            <div class="card mt-5">
                <h3 class="card-header p-3">Partisipan Project <strong>{{$projectName}}</strong></h3>
                <div class="card-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Rates</th>
                                <th>Pengalaman Project</th>
                                <th>Interview</th>
                                <th>Pilih Talent</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
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
            </div>
        </div>
    </div>
    </div>
    <!-- End Blog Section -->

    @include('footer')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(function () {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('getBidDetail', ['projectId' => $projectId]) }}",
                    type: "GET"
                },
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'rates', name: 'rates' },
                    { data: 'pengalaman', name: 'pengalaman' },
                    { data: 'interview', name: 'interview', orderable: false, searchable: false },
                    { data: 'choose', name: 'choose', orderable: false, searchable: false },
                ]
            });

        });
    </script>
</body>

</html>
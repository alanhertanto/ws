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
                            <li class=""><a class="nav-link" href="/find-job">Find Work</a></li>
                        @endif
                    @endauth
                    @auth
                        @if (Auth::user()->role == 'Client')
                            <li class=""><a class="nav-link" href="/job">Find Talent</a></li>
                        @endif
                    @endauth
                    <li class="nav-item active"><a class="nav-link" href="/blog">Blog</a></li>
                    @auth
                        @if (Auth::user()->role !== null)
                            <li class=""><a class="nav-link" href="/chat">Chat</a></li>
                        @endif
                    @endauth
                    <li clas=""><a class="nav-link" href="/about">About Us</a></li>
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
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Blog</h1>
                        <p class="mb-4">Dapatkan wawasan terbaru, cerita inspiratif, dan sumber daya berharga di blog
                            kami. Jelajahi panduan praktis untuk meningkatkan produktivitas, temukan kisah sukses dari
                            profesional di berbagai industri, dan manfaatkan sumber daya gratis yang dirancang untuk
                            membantu Anda mencapai kesuksesan dalam karir Anda.
                            Mari bergabung dengan komunitas kami di WorkInStudio dan bersama-sama kita bangun masa depan
                            yang lebih baik dalam dunia kerja yang fleksibel.</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="{{asset('images/blog-post.png')}}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Blog Section -->
    <div class="blog-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="section-title text-center my-4">{{$blog->blogTitle}}</h2>
                    <div class="text-center my-5">
                        <img src="{{ asset('blogs/' . $blog->foto) }}" alt="Image" class="img-fluid">
                    </div>
                    <div class="text-justify">
                        <p>{{$blog->blogDescription}}</p>
                        <div class="meta">
                            <strong><span>Diterbitkan Pada {{$blog->created_at}}</span></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Section -->

    @include('footer')

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
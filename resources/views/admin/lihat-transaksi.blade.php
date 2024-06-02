<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>WorkinStudio </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" href="{{asset("favicon.ico")}}">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset("admin/css/bootstrap.min.css")}}">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset("admin/css/font-awesome.min.css")}}">
  <!-- nalika Icon CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset("admin/css/nalika-icon.css")}}">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset("admin/css/owl.carousel.css")}}">
  <link rel="stylesheet" href="{{asset("admin/css/owl.theme.css")}}">
  <link rel="stylesheet" href="{{asset("admin/css/owl.transitions.css")}}">
  <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset("admin/css/animate.css")}}">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset("admin/css/normalize.css")}}">
  <!-- meanmenu icon CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset("admin/css/meanmenu.min.css")}}">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset("admin/css/main.css")}}">
  <!-- morrisjs CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset("admin/css/morrisjs/morris.css")}}">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset("admin/css/scrollbar/jquery.mCustomScrollbar.min.css")}}">
  <!-- metisMenu CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset("admin/css/metisMenu/metisMenu.min.css")}}">
  <link rel="stylesheet" href="{{asset("admin/css/metisMenu/metisMenu-vertical.css")}}">
  <!-- calendar CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset("admin/css/calendar/fullcalendar.min.css")}}">
  <link rel="stylesheet" href="{{asset("admin/css/calendar/fullcalendar.print.min.css")}}">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset("admin/style.css")}}">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset("admin/css/responsive.css")}}">
  <!-- modernizr JS
		============================================ -->
  <script src="{{asset("admin/js/vendor/modernizr-2.8.3.min.js")}}"></script>
</head>

<body>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

  @include('admin.sidebar')

  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="logo-pro">
            <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
          </div>
        </div>
      </div>
    </div>
    <div class="header-advance-area">
      <div class="header-top-area">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="header-top-wraper">
                <div class="row">
                  <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                    <div class="menu-switcher-pro">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                    <div class="header-top-menu tabl-d-n hd-search-rp">
                      <div class="breadcome-heading">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="header-right-info">
                      <ul class="nav navbar-nav mai-top-nav header-right-menu">
                        <li class="nav-item">
                          <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                            class="nav-link dropdown-toggle">
                            <i class="icon nalika-user"></i>
                            <span class="admin-name">Admin</span>
                            <i class="icon nalika-down-arrow nalika-angle-dw"></i>
                          </a>
                          <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                            <li><a href="/logout"><span class="icon nalika-unlocked author-log-ic"></span>
                                Log Out</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="breadcome-area">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="breadcome-list">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="breadcomb-wp">
                      <div class="breadcomb-icon">
                        <i class="icon nalika-home"></i>
                      </div>
                      <div class="breadcomb-ctn">
                        <h2>Lihat Transaksi</h2>
                        <p>Selamat Datang <span class="bread-ntd">Admin</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="product-sales-area mg-tb-30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-sales-chart table">
              <div class="card mt-5">
                <h3 class="card-header p-3  white"><strong>Semua Project</strong></h3>
                <div class="card-body" style="with:100%">
                  <table class="table table-bordered data-table black">
                    <thead>
                      <tr>
                        <th>Pekerjaan</th>
                        <th>Nama Talent</th>
                        <th>Nama Client</th>
                        <th>Harga Project</th>
                        <th>Tgl Dibuat</th>
                        <th>Status</th>
                        <th>Aksi</th>
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
      </div>
    </div>
  </div>
  <!-- jquery
		============================================ -->
  <script src="{{asset("admin/js/vendor/jquery-1.12.4.min.js")}}"></script>
  <!-- bootstrap JS
		============================================ -->
  <script src="{{asset("admin/js/bootstrap.min.js")}}"></script>
  <!-- wow JS
		============================================ -->
  <script src="{{asset("admin/js/wow.min.js")}}"></script>
  <!-- price-slider JS
		============================================ -->
  <script src="{{asset("admin/js/jquery-price-slider.js")}}"></script>
  <!-- meanmenu JS
		============================================ -->
  <script src="{{asset("admin/js/jquery.meanmenu.js")}}"></script>
  <!-- owl.carousel JS
		============================================ -->
  <script src="{{asset("admin/js/owl.carousel.min.js")}}"></script>
  <!-- sticky JS
		============================================ -->
  <script src="{{asset("admin/js/jquery.sticky.js")}}"></script>
  <!-- scrollUp JS
		============================================ -->
  <script src="{{asset("admin/js/jquery.scrollUp.min.js")}}"></script>
  <!-- mCustomScrollbar JS
		============================================ -->
  <script src="{{asset("admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js")}}"></script>
  <script src="{{asset("admin/js/scrollbar/mCustomScrollbar-active.js")}}"></script>
  <!-- metisMenu JS
		============================================ -->
  <script src="{{asset("admin/js/metisMenu/metisMenu.min.js")}}"></script>
  <script src="{{asset("admin/js/metisMenu/metisMenu-active.js")}}"></script>
  <!-- sparkline JS
		============================================ -->
  <script src="{{asset("admin/js/sparkline/jquery.sparkline.min.js")}}"></script>
  <script src="{{asset("admin/js/sparkline/jquery.charts-sparkline.js")}}"></script>
  <!-- calendar JS
		============================================ -->
  <script src="{{asset("admin/js/calendar/moment.min.js")}}"></script>
  <script src="{{asset("admin/js/calendar/fullcalendar.min.js")}}"></script>
  <script src="{{asset("admin/js/calendar/fullcalendar-active.js")}}"></script>
  <!-- float JS
		============================================ -->
  <script src="{{asset("admin/js/flot/jquery.flot.js")}}"></script>
  <script src="{{asset("admin/js/flot/jquery.flot.resize.js")}}"></script>
  <script src="{{asset("admin/js/flot/curvedLines.js")}}"></script>
  <script src="{{asset("admin/js/flot/flot-active.js")}}"></script>
  <!-- plugins JS
		============================================ -->
  <script src="{{asset("admin/js/plugins.js")}}"></script>
  <!-- main JS
		============================================ -->
  <script src="{{asset("admin/js/main.js")}}"></script>

  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

  <script type="text/javascript">
    $(function () {
      var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('getAllTransaction') }}",
          type: "GET"
        },
        columns: [
          { data: 'projectName', name: 'projectName' },
          { data: 'talentName', name: 'talentName' },
          { data: 'clientName', name: 'clientName' },
          { data: 'amount', name: 'amount' },
          { data: 'transaksi_created_at', name: 'transaksi_created_at' },
          { data: 'status_transaksi', name: 'status_transaksi' },
          { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
      });
    });
  </script>


</body>

</html>
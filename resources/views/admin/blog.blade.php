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
  <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
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
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
                          <a href="" data-toggle="dropdown" role="button" aria-expanded="false"
                            class="nav-link dropdown-toggle">
                            <i class="icon nalika-user"></i>
                            <span class="admin-name">Admin</span>
                          </a>
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
                        <h2>Lihat Blog</h2>
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
                <h3 class="card-header p-3"><strong>Semua Blog</strong></h3>
                <hr>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Buat Postingan Blog
                </button>
                <!-- Modal Popup -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buat Postingan Blog</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('postBlog') }}" method="post" class="text-white"
                          enctype="multipart/form-data">
                          @csrf
                          <div class="mb-3">
                            <label for="blogTitle" class="form-label black">Judul Blog</label>
                            <input type="text" class="form-control" id="blogTitle" name="blogTitle"
                              placeholder="Judul Blog...">
                          </div>
                          <div class="mb-3">
                            <label for="blogDescription" class="form-label black">Isi Blog</label>
                            <textarea class="form-control" id="blogDescription" name="blogDescription"
                              style="height: 25em;"></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="blogFile" class="form-label black">Foto Blog</label>
                            <input class="form-control no-height" type="file" id="blogFile" name="blogFile">
                          </div>
                          <div class="mb-3">
                            <label for="isFeatured" class="form-label black">Apakah Featured/Headline ?</label>
                            <select class="form-control" id="isFeatured" name="isFeatured">
                              <option value="false">Tidak</option>
                              <option value="true">Iya</option>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Edit Blog Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Blog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('updatePosting') }}" method="post" class="text-white"
                          enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" id="editblogId" name="id">
                          <div class="form-group">
                            <label for="editblogTitle">Title</label>
                            <input type="text" class="form-control" id="editblogTitle" name="blogTitle" required>
                          </div>
                          <div class="form-group">
                            <label for="editblogDescription">Description</label>
                            <textarea class="form-control" id="editblogDescription" name="blogDescription" required
                              style="height: 25em;"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="editisFeatured">Is Featured</label>
                            <select class="form-control" id="editisFeatured" name="isFeatured" required>
                              <option value="true">Yes</option>
                              <option value="false">No</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="editblogFile">File</label>
                            <input type="file" class="form-control" id="editblogFile" name="blogFile">
                          </div>
                          <button type="submit" class="btn btn-primary" id="updateBtn">Simpan</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <hr>
                <div class="card-body" style="with:100%">
                  <table class="table table-bordered data-table black">
                    <thead>
                      <tr>
                        <th>Pekerjaan</th>
                        <th>Nama Talent</th>
                        <th>Nama Client</th>
                        <th>Harga blog</th>
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
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
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
    $(document).ready(function () {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('getAllBlog') }}",
          type: "GET"
        },
        columns: [
          { data: 'blogTitle', name: 'blogTitle' },
          {
            data: 'blogDescription',
            name: 'blogDescription',
            render: function (data, type, full, meta) {
              return data.length > 100 ? data.substr(0, 100) + '...' : data;
            }
          },
          { data: 'isFeatured', name: 'isFeatured' },
          {
            data: 'foto',
            name: 'foto',
            render: function (data, type, full, meta) {
              return '<img src="{{ asset('blogs/') }}/' + data + '" style="max-width: 100px; max-height: 100px;">';
            }
          },
          { data: 'created_at', name: 'created_at' },
          { data: 'updated_at', name: 'updated_at' },
          { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
      });

      $(document).on('click', '.edit', function () {
        var blogId = $(this).data('id');

        $.ajax({
          url: "{{ route('editPosting') }}",
          type: 'GET',
          data: { blogId: blogId },
          success: function (response) {
            $('#editblogTitle').val(response.blogTitle);
            $('#editblogDescription').val(response.blogDescription);
            $('#editisFeatured').val(response.isFeatured ? 'true' : 'false');
            $('#editblogId').val(blogId);

            $('#editModal').modal('show');
          },
          error: function (xhr) {
            console.log(xhr.responseText);
          }
        });
      });

      $(document).on('click', '.delete', function () {
        var blogId = $(this).data('id');

        $.ajax({
          url: "{{ route('deletePosting') }}",
          type: 'DELETE',
          data: { blogId: blogId },
          success: function (response) {
            table.ajax.reload();
          },
          error: function (xhr) {
            console.log(xhr.responseText);
          }
        });
      });
    });
  </script>


</body>

</html>
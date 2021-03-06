<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tabel Pengaduan</title>

  <!-- Custom fonts for this template -->
  <link href="{{asset('public/template/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('public/template/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{asset('public/template/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pengaduan <sup>Masyarakat</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.admin')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Manajemen Pengaduan
      </div>

      @if (auth()->user()->role == 'admin')
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('petugas.index')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Data Petugas</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('masyarakat.index')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Data Masyarakat</span>
        </a>
      </li>
      @endif

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('pengaduan.proses')}}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Pengaduan Diproses</span>
        </a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('pengaduan.tanggapi')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Tanggapi Pengaduan</span></a>
      </li>

      <!-- Divider -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

        <!-- Topbar Navbar -->
  <!-- Topbar Navbar -->
<script type="text/javascript">
  function dark(){
    document.getElementById('accordionSidebar').style.background = '#000020';
    document.getElementById('page-top').style.color = '#ccc';
    document.getElementById('content').style.background = '#000025';
    document.getElementByClassName('card').style.background = 'black';
  }
</script>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Cari Pengaduan" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
<!--             <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>

                <span class="badge badge-danger badge-counter">9999</span>
              </a>

              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Noftifikasi
                </h6>
                <a class="dropdown-item d-flex align-items-center">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">tgl</div>
                    <span class="small text-dark-500">P</span>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Tampilkan semua Notifikasi</a>
              </div>
            </li> 
            <div class="topbar-divider d-none d-sm-block"></div> -->

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 animated--grow-in d-lg-inline text-gray-600"><i class="fas fa-user fa-fw mr-2 text-gray-400"></i> </span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profil.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <a onclick="dark();" class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Tema Gelap (Beta)
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4 animated--grow-in">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> DATA PENGADUAN MASYARAKAT</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Nama</th>
                      <th>Isi Laporan</th>
                      {{-- <th>Foto</th> --}}
                      {{-- <th>Tanggapan</th> --}}
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach ($data as $item)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->tanggal}}</td>
                        <td>{{ucwords($item->masyarakat->nama)}}</td>
                        <td>{{$item->teks_pengaduan}}</td>
                        {{-- <td class="text-center"><a href="{{url('public/images/pengaduan/' . $item->foto)}}" target="_blank"><img src="{{asset('public/images/pengaduan/' . $item->foto)}}" style="width: 100px;height: auto;"></a></td> --}}
                        {{-- @if ($item->tanggapan == null)
                          <td>Belum ditanggapi</td>
                        @else
                          <td>{{$item->tanggapan->teks_respon}}</td>
                        @endif --}}
                        <td>{{-- <a href="{{route('detail.tanggapan', $item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-eye"></i> Detail</a> --}}
                        <a href="{{route('beri.tanggapan', $item->id)}}" class="btn btn-success btn-sm"><i class="fas fa-fw fa-pen"></i> Tanggapi</a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('public/template/admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('public/template/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('public/template/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('public/template/admin/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('public/template/admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('public/template/admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('public/template/admin/js/demo/datatables-demo.js')}}"></script>

</body>

</html>

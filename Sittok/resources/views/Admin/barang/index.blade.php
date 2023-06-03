<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="/assets/img/logo/sittok-gambar.png" rel="icon">
  <title>SITTOK</title>
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('Admin.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #810CA8;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="../assets/img/boy.png" style="max-width: 60px">
                
              </a>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Master Barang</h1>
           
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
        <!---Container Fluid-->
        
        <!-- <Form Basic> -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Master Barang</h6>
                  
                  <a href = "{{ route('barang.create')}}" class = "btn btn-outline-primary btn-xs mb-0">+</a>
                </div>
                <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                @if(Session::has('success'))
                                  <div class="alert alert-primary" role="alert">
                                    {{ Session::get('success') }}
                                  </div>
                                @endif
                                <thead>
                                
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Merk Barang</th>
                                            <th>Jumlah Barang</th>
                                            <th>Harga</th>
                                            <th>Deskripsi</th>
                                            <th>ID Kategori</th>
                                            <th>Gambar</th>
                                            <th width="150px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if($barangs->count() > 0)
                                      @foreach($barangs as $barang)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration}}</td>
                                            <td class="align-middle">{{ $barang->merk_barang}}</td>
                                            <td class="align-middle">{{ $barang->jumlah_barang}}</td>
                                            <td class="align-middle">{{ $barang->harga}}</td>
                                            <td class="align-middle">{{ $barang->deskripsi}}</td>
                                            <td class="align-middle">{{ $barang->id_kategori}}</td>
                                            <td class="align-middle"><img src="/images/{{ $barang->gambar}}" width="60px" ></td> 
                                            <td>
                                            <a href="{{ route('barang.edit', $barang->id_barang)}}" class="btn btn-primary btn-circle "><i class="fas fa-pen"></i></a>
                                            <form action="{{ route('barang.destroy', $barang->id_barang) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Ingin Menghapus Data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0"><i class="fas fa-trash"></i></button>
                                            </form>
                                          </td> 
                                        </tr>
                                        @endforeach
                                      @else
                                      <tr>
                                        <td class="text-center" colspan="8">Data Barang Tidak Ditemukan</td>
                                      </tr>
                                      @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>
              </div>
        <!-- <Form Basic> -->
      </div>
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../assets/js/ruang-admin.min.js"></script>
  <script src="../assets/vendor/chart.js/Chart.min.js"></script>
  <script src="../assets/js/demo/chart-area-demo.js"></script>   
</body>

</html
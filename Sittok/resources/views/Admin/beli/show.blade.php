<!DOCTYPE html>

<html lang="en">
<style>
        .container {
           
            align-items: center; /* Mengatur pemusat vertikal */
            font-family: Arial, sans-serif; /* Mengatur jenis font */
        }
        

        h1 {
            margin-top: 0;
        }

        p {
            margin-bottom: 0px;
        }

        .button
        {
          width="125px"
        }
    </style>
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
                <img class="img-profile rounded-circle" src="/{{ $user->poto }}" style="max-width: 60px">
                
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                <h6 style="color: purple;">{{ Auth::user()->user_fullname }}</h6>
                </a>
                <a class="dropdown-item" href="{{ route('user.edit', ['user' => auth()->user()->id]) }}">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('loginn')}}" onclick="return confirm('Apakah anda yakin ingin keluar dari halaman ini?')" 
                  class="dropdown-item">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Master Pembelian</h1>
           
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Master Pembelian</h6>
                  </div>
                  <div class="container">
                        <p>Tanggal Pembelian : {{ $beli->created_at}}</p>              
                        <p>Nama Supplier : {{ $beli->supplier->nama_supplier}}</p>
                        <p>Alamat Supplier : {{ $beli->supplier->alamat}}</p>
                        <p>No Telp Supplier : {{ $beli->supplier->no_telp_supplier}}</p>
                        <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Nama Barang</th>
                              <th>Qty</th>
                              <th>Harga Beli</th>
                              <th>Total</th>
                              <th>Gambar</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="align-middle">{{ $beli->barang->merk_barang}}</td>
                              <td class="align-middle">{{ $beli->jumlah_beli}}</td>
                              <td class="align-middle">{{ $beli->formatted_harga}}</td>
                              <td class="align-middle">{{ $formattedTotal}}</td>
                              <td class="align-middle"><img src="/{{ $beli->barang->gambar}}" width="50px" ></td>
                            </tr>
                          </tfoot>
                        </table>
                        <br>
                        <div style="width: 125px; float: right; margin-left: 500px;margin-bottom: 30px;" >
                          <a href="{{ route('beli.index')}}" class="btn btn-secondary btn-user btn-block">Kembali</a>
                        </div>
                        <br>
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
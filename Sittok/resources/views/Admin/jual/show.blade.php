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
            <h1 class="h3 mb-0 text-gray-800">Data Jual</h1>
           
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Jual</h6>
                  </div>
                  <div class="container">
                        <p>Data Transaksi : </p>
                        <ul>
                            <li>Tanggal Transaksi :{{ $jual->created_at}}</li>
                            <li>Nama Customer :  {{ $jual->customer->nama_customer}} </li>
                            <li>No HP Customer :  {{ $jual->customer->no_telp_customer}} </li>
                        </ul>
                        
                        <p>Data Penerima : </p>
                        <ul>
                            <li>Nama : {{ $jual->nama_lengkap}}</li>
                            <li>Alamat : {{ $jual->alamat}}</li>
                            <li>No HP : {{ $jual->nohp}}</li>
                        </ul>

                        <p>Data Pesanan : </p>
                        <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Nama Barang</th>
                              <th>Qty</th>
                              <th>Harga</th>
                              <th>Total</th>
                             
                            </tr>
                          </thead>
                          <tbody>

                          @foreach ($jual->detilJual as $detilJual)
                            <tr>
                              <td class="align-middle">{{ $detilJual->barang->merk_barang }}</td>
                              <td class="align-middle">{{ $detilJual->qty }}</td>
                              <td class="align-middle">Rp. {{ number_format($detilJual->harga, 0, ',', '.') }}</td>
                              <td class="align-middle">Rp. {{ number_format($detilJual->jumlah, 0, ',', '.') }}</td>
                             
                            </tr>
                            @endforeach
                          </tfoot>
                          <tr>
                              <td colspan="3" class="text-left">Total Keseluruhan</td>
                              <td>Rp. {{ number_format($jual->detilJual->sum('jumlah'), 0, ',', '.') }}</td>
                          </tr>
                        </table>
                        <p>Bukti Pembayaran : </p>
                        @if ($jual->bukti_bayar)
                            <img class="gambar" src="/{{ $jual->bukti_bayar }}" alt="Gambar Bayar" width="300px">
                        @else
                            <p style="color: red;"><strong>Not Found!!! Transaksi Belum Dibayar</strong></p>
                        @endif
                        <br>
                        <div style="width: 125px; float: right; margin-left: 500px;margin-bottom: 30px;" >
                          <a href="{{ route('jual.index')}}" class="btn btn-secondary btn-user btn-block">Kembali</a>
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
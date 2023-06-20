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
                <img class="img-profile rounded-circle" src="/assets/img/boy.png" style="max-width: 60px">
                
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
            
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data User</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Data User</h6>
                </div>
                <div class="card-body">
             
                  <form method="POST" action="{{ route('user.update', $user->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')  
                  <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" name= "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Email" value="{{ $user->email }}">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="text" name= "password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Password" value="{{ $user->password }}">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Fullname</label>
                      <input type="text" name="user_fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan User Fullname" value="{{ $user->user_fullname }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">No Telp</label>
                      <input type="text" name= "telp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Telp" value="{{ $user->telp }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input type="text" name= "alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Alamat" value="{{ $user->alamat }}">
                    </div>
                    <div class="form-group row" style="position: relative; float: left; ">
                      <div class="px-3" style="width: 150px;">
                        <button type="submit" name="update" class="btn btn-primary btn-user btn-block">Simpan</button>
                      </div>
                      <div style="width: 125px;">
                        <a href="{{ route('user.index')}}" class="btn btn-secondary btn-user btn-block">Kembali</a>
                      </div>
                    </div>
                    
                  </form>
             
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

  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="/assets/js/ruang-admin.min.js"></script>
  <script src="/assets/vendor/chart.js/Chart.min.js"></script>
  <script src="/assets/js/demo/chart-area-demo.js"></script>  
</body>

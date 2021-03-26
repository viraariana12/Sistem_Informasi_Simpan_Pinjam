@extends('admin.template')

@section('title', 'Dashboard')
    

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Total Simpanan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($simpanan)</div>
            </div>
            <div class="col-auto">
              <div class="icon-circle bg-success">
                <i class="fas fa-donate text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pinjaman</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($pinjaman)</div>
            </div>
            <div class="col-auto">
              <div class="icon-circle bg-success">
                <i class="fas fa-donate text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- New User Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">Pendaftar</div>
            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$pendaftaran}}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-warning"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!--Row-->
  <div class="row mb-3">
  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">Pengajuan Pinjaman</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pengajuan}}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-file-contract fa-3x text-warning"></i>
          </div>
        </div>
      </div>
    </div>
  </div>  
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">Pinjaman Yang Berhasil</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pengajuan_berhasil}}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-file-contract fa-3x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
  </div>  
  <!-- New User Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">Anggota</div>
            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$anggota}}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-info"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
</div>

<!---Container Fluid-->
@endsection
    
   
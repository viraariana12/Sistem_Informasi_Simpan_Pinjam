@extends('anggota.template')

@section('title', 'Dashboard')
    
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Simpanan -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Dana Simpanan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($total_saldo) </div>
            </div>
            <div class="icon-circle bg-success">
              <i class="fas fa-donate text-white"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Pinjaman -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Dana Pinjaman</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($total_pinjaman)</div>
            </div>
            <div class="icon-circle bg-success">
              <i class="fas fa-donate text-white"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  
  </div>
  <!--Row-->
</div>
<!---Container Fluid-->
@endsection
    
   
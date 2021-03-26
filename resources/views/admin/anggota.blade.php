@extends('admin.template')
@section('title', 'Anggota')
@section('content')



    <!-- DataTable with Hover -->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Anggota</h1>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">DataAnggotan</li>
      </ol>
      </div>

    
    <div class="col-lg-12">
    <div class="col-lg-12">
        <div class="card mb-4">
          <br>
    <div class="container">
      @if (session('status'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
      @endif
    </div>
        
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Nip</th>
                  <th>Username</th>
                  <th>Sekolah</th>
                  <th>Simpanan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($anggota as $data)              
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->nama}}</td>   
                    <td>{{$data->nip}}</td>   
                    <td>{{$data->username}}</td>   
                    <td>{{$data->sekolah}}</td>   
                    <td></td>   
                    <td> 
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#detail-data{{$data->id}}">
                      <i class="far fa-eye"></i>
                      </button>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-data{{$data->id}}">
                        <i class="fas fa-user-edit"></i>
                        </button>
    
                    </td>   
                  </tr>  
                  @endforeach
              </tbody>
            </table>

            @foreach ($anggota as $data)
             <!--modal Detail-->
    <div class="modal fade" id="detail-data{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Pendaftar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="card">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{$data->nip}}</li>
              <li class="list-group-item">{{$data->nama}}</li>
              <li class="list-group-item">{{$data->jenis_kelamin}}</li>
              <li class="list-group-item">{{$data->agama}}</li>
              <li class="list-group-item">{{$data->alamat}}</li>
              <li class="list-group-item">{{$data->sekolah}}</li>
            </ul>
            <br>
            
            <img src="{{ asset ($data->ktp) }}" class="card-img-top">
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <!--modal Edit-->
    <div class="modal fade" id="edit-data{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="/admin/manajemen/member/{{$data->id}}">
            @method('patch')
            @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="username">Masukan Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{$data->username}}" id="username" name="username" readonly>
              @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control  @error('nama') is-invalid @enderror" value="{{$data->nama}}" id="nama" name="nama">
            @error('nama')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control  @error('email') is-invalid @enderror" value="{{$data->email}}" id="email" name="email">
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
          <div class="form-group">
            <label for="sekolah">Sekolah</label>
            <input type="text" class="form-control  @error('sekolah') is-invalid @enderror" value="{{$data->sekolah}}" id="sekolah" name="sekolah" >
            @error('sekolah')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
          <div class="form-group">
            <label for="no_ponsel">No Ponsel</label>
            <input type="text" class="form-control  @error('no_ponsel') is-invalid @enderror" value="{{$data->no_ponsel}}" id="no_ponsel" name="no_ponsel" >
            @error('no_ponsel')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
          <div class="form-group">
            <label for="sekolah">Sekolah</label>
            <input type="text" class="form-control  @error('sekolah') is-invalid @enderror" value="{{$data->sekolah}}" id="sekolah" name="sekolah" >
            @error('sekolah')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
          <div class="form-group">
            <label for="alamat">alamat</label>
            <input type="text" class="form-control  @error('alamat') is-invalid @enderror" value="{{$data->alamat}}" id="alamat" name="alamat" >
            @error('alamat')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="masukan password" >
          @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>
    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </div>
    </form>
    </div>
    

    <!--Akhir modal Edit-->
    
            </div>
          </div>
        </div>
      </div>
    <!--row-->
    </div>
  @endforeach

@endsection
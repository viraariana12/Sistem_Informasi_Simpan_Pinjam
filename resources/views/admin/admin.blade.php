@extends('admin.template')
@section('title', 'Admin')
@section('content')



    <!-- DataTable with Hover -->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Admin</h1>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
      </ol>
      </div>



    <div class="col-lg-12">
        <div class="card mb-4">
         
         <!-- Modal tambah -->
          <div class="container mt-5">
              <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambah"
                id="#myBtn">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Admin</span>
              </button>
            </div>
    
          <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="">
              <div class="modal-body">
                @csrf
                <div class="form-group">
                  <label for="username">Masukan Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" id="username" name="username" placeholder="Masukan username">
                  @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control  @error('nama') is-invalid @enderror" value="{{ old('nama') }}" id="nama" name="nama"placeholder="Masukan Nama">
                @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email"placeholder="Masukan email">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="level">Level</label>
                <input type="text" class="form-control @error('level') is-invalid @enderror" value="AdminSuper" id="level" name="level" placeholder="admin" readonly>
                @error('level')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label for="password">Masukan Password</label>
                <input type="password" class="form-control  @error('password') is-invalid @enderror" value="{{ old('password') }}"id="password" name="password" placeholder="masukan password">
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Tambah</button>
              </div>
            </div>
          </div>
        </form>
        </div>
        <br>
    <!-- Modal tambah -->
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
                  <th>Username</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($admins as $row)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$row->nama}}</td>
                  <td>{{$row->username}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->level}}</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-data{{$row->id}}">
                      <i class="fas fa-user-edit"></i>
                     </button>
 
                  <form action=" /admin/manajemen/admin/{{ $row->id }}" method="post" class="d-inline">
                       @method('delete')
                       @csrf
                       <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                   </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <!--Row-->
  </div>
  
  @foreach ($admins as $row)
     <!-- Modal edit -->
      <div class="modal fade" id="edit-data{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="/admin/manajemen/admin/{{$row->id}}">
        @method('patch')
        @csrf
      <div class="modal-body">
        @csrf
        <div class="form-group">
          <label for="username">Masukan Username</label>
          <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{$row->username}}" id="username" name="username" placeholder="Masukan username">
          @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control  @error('nama') is-invalid @enderror" value="{{$row->nama}}" id="nama" name="nama"placeholder="Masukan Nama">
        @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control  @error('email') is-invalid @enderror" value="{{$row->email}}" id="email" name="email"placeholder="Masukan email">
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
      <div class="form-group">
        <label for="level">Level</label>
        <input type="text" class="form-control  @error('level') is-invalid @enderror" value="{{$row->level}}" id="level" name="level" readonly>
        @error('level')
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
<!-- Modal Edit -->

@endforeach

@endsection
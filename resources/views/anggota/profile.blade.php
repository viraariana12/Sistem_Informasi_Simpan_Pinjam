@extends('anggota.template')

@section('title', 'Profile')
    

@section('content')
<div class="container mb-2">
  <br>
 
    @if (session('status'))
    <div class="alert alert-success alert-dismissible" role="alert">
      {{ session('status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
    @endif
 
    <ul class="list-group list-group-flush">
      <h5 class="mb-1">Username</h5>
      <li class="list-group-item">{{$user->username}}</li>
      <h5 class="mb-1">Nama </h5>
      <li class="list-group-item">{{$user->nama}}</li>
      <h5 class="mb-1">Nip</h5>
      <li class="list-group-item">{{$user->nip}}</li>
      <h5 class="mb-1">Sekolah</h5>
      <li class="list-group-item">{{$user->sekolah}}</li>
      <h5 class="mb-1">Email</h5>
      <li class="list-group-item">{{$user->email}}</li>
      <h5 class="mb-1">Alamat</h5>
      <li class="list-group-item">{{$user->alamat}}</li>
      </ul>
      <br>
      <br>
      <a class="btn btn-success float-right" href="{{url('anggota/dashboard')}}" role="button"><i class="fas fa-arrow-left"></i><span> kembali</span></a>
      <button type="button" class="btn btn-primary float-right mr-3" data-toggle="modal" data-target="#edit-data{{$user->id}}">
        <i class="fas fa-user-edit"></i>
       </button>
    
 

    <br>
      <div class="modal fade" id="edit-data{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          
          <form method="POST" action="{{route ('profil-member-update')}}">
                     
                          @csrf
                          <div class="modal-body">
                          <div class="form-group">
                            <label for="username">Masukan Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{$user->username}}" id="username" name="username" readonly>
                            @error('username')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control  @error('nama') is-invalid @enderror" value="{{$user->nama}}" id="nama" name="nama">
                          @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control  @error('email') is-invalid @enderror" value="{{$user->email}}" id="email" name="email">
                          @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="form-group">
                          <label for="sekolah">Sekolah</label>
                          <input type="text" class="form-control  @error('sekolah') is-invalid @enderror" value="{{$user->sekolah}}" id="sekolah" name="sekolah" >
                          @error('sekolah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="form-group">
                          <label for="no_ponsel">No Ponsel</label>
                          <input type="text" class="form-control  @error('no_ponsel') is-invalid @enderror" value="{{$user->no_ponsel}}" id="no_ponsel" name="no_ponsel" >
                          @error('no_ponsel')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="form-group">
                          <label for="sekolah">Sekolah</label>
                          <input type="text" class="form-control  @error('sekolah') is-invalid @enderror" value="{{$user->sekolah}}" id="sekolah" name="sekolah" >
                          @error('sekolah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="form-group">
                          <label for="alamat">alamat</label>
                          <input type="text" class="form-control  @error('alamat') is-invalid @enderror" value="{{$user->alamat}}" id="alamat" name="alamat" >
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
              <button type="sumbit" class="btn btn-success">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      </div>


@endsection
    
   
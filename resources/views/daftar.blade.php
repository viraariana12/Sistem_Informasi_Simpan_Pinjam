@extends('index')
@section('title', 'Pendaftaran')
@section('content')


<div id="ftco-consult">
  <div class="video ftco-video" style="background-image: url(/assets/images/hero_3.jpg);" data-stellar-background-ratio="0.5">
  </div>
  <div class="choose choose-form animate-box">
    <div class="ftco-heading">
      @if (session('status'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        @endif

      <h2>Pendaftaran Anggota</h2>
    </div>
    <form action="/admin/manajemen/registration" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="row form-group">
        <div class="col-sm-12">
          <label for="nip">Nip</label>
          <input type="text" id="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}" name="nip">
          @error('nip')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
      </div>

      <div class="row form-group">
        <div class="col-sm-12">
          <label for="nama">Nama</label>
          <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" name="nama">
          @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
      </div>
      <div class="row form-group">
        <div class="col-sm-6">
          <label for="inputState">Jenis Kelamin</label>
                <select id="inputState" class="form-control @error('jenis_kelamin') is-invalid @enderror" value="{{ old('jenis_kelamin') }}"  name="jenis_kelamin">
                  <option selected value="">Pilih...</option> 
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        </div>
        <div class="col-sm-6">
          <label for="inputState">Agama</label>
                <select id="inputState" class="form-control @error('agama') is-invalid @enderror" value="{{ old('agama') }}"  name="agama">
                  <option selected value="">Pilih...</option>
                <option value="Islam">Islam</option>
                <option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
              </select>
                @error('agama')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        </div>
        
      </div>
      
      <div class="row form-group">
        <div class="col-sm-12">
          <label for="alamat">Alamat</label>
          <input type="text" id="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" name="alamat">
          @error('alamat')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
      </div>

      <div class="row form-group">
        <div class="col-sm-12">
          <label for="email">Email</label>
          <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email">
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
      </div>
      
      <div class="row form-group">
        <div class="col-sm-12">
          <label for="sekolah">Sekolah</label>
          <input type="text" id="sekolah" class="form-control @error('sekolah') is-invalid @enderror" value="{{ old('sekolah') }}" name="sekolah">
          @error('sekolah')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
      </div>
      <div class="row form-group">
        <div class="col-sm-12">
          <label for="no_ponsel">No Ponsel</label>
          <input type="text" id="no_ponsel" class="form-control @error('no_ponsel') is-invalid @enderror" value="{{ old('no_ponsel') }}" name="no_ponsel">
          @error('no_ponsel')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
      </div>
     
      <div class="row form-group">
        <div class="col-sm-12">
          <label for="ktp">Ktp</label>
          <input type="file" class="form-control-file @error('ktp') is-invalid @enderror" value="{{ old('ktp') }}" id="ktp" name="ktp">
          @error('ktp')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
      </div>

      <div class="row form-group">
        <div class="col-sm-12">
        <input type="hidden" id="status" class="form-control @error('status') is-invalid @enderror" value="Pending" name="status">
        </div>
      </div>

      <div class="form-group">
        <a href="{{url('/')}}" type="button" class="btn btn-danger">Batal</a>
            <input type="submit" value="Daftar" class="btn btn-success">
      </div>

    </form>	
  </div>
</div>


@endsection
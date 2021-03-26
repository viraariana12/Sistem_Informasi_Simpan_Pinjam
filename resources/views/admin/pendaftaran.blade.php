@extends('admin.template')
@section('title', 'Pendaftaran')
@section('content')
    <!-- DataTable with Hover -->

    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Pendaftaran</h1>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data Pendaftaran</li>
      </ol>
      </div>

    <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Tabel Pendaftaran</h6>
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Nip</th>
                  <th>Alamat</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($registration as $row)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$row->created_at->format('d-m-yy')}}</td>
                  <td>{{$row->nama}}</td>
                  <td>{{$row->nip}}</td>
                  <td>{{$row->alamat}}</td>
                  <td>
                    @if ($row->status == 'Terdaftar')
                    <span class="badge badge-success">{{$row->status}}</span>
                  @elseif($row->status == 'Ditolak')
                  <span class="badge badge-danger">{{$row->status}}</span>
                  @else
                  <span class="badge badge-warning">Belum Diverifikasi</span>
                @endif
              </td>

                  <td>
                    @if ($row->status == 'Ditolak')
                    <button type="submit" class="btn btn-info" disabled><i class="fas fa-user-plus"></i></i></button>
                    @elseif($row->status == 'Pending')
                      <button type="submit" class="btn btn-info" disabled><i class="fas fa-user-plus"></i></i></button>
                    @else
                      <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#tambah-data{{$row->id}}"><i class="fas fa-user-plus"></i></i></button>
                    @endif

                    
                     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#detail-data{{$row->id}}">
                     <i class="far fa-eye"></i>
                     </button>
                    
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-data{{$row->id}}">
                     <i class="fas fa-user-edit"></i>
                     </button>
 
                     <form action="/admin/manajemen/registration/{{ $row->id }}" method="post" class="d-inline">
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
  
  @foreach ($registration as $row)
  
    <!--modal Detail-->
    <div class="modal fade" id="detail-data{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
              <li class="list-group-item">{{$row->nip}}</li>
              <li class="list-group-item">{{$row->nama}}</li>
              <li class="list-group-item">{{$row->jenis_kelamin}}</li>
              <li class="list-group-item">{{$row->agama}}</li>
              <li class="list-group-item">{{$row->alamat}}</li>
              <li class="list-group-item">{{$row->sekolah}}</li>
              <li class="list-group-item">{{$row->no_ponsel}}</li>
            </ul>
            <br>
            
            <img src="{{ asset ($row->ktp) }}" class="card-img-top">
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
      
      <!--modal Tambah-->
      <div class="modal fade" id="tambah-data{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Data Akun Pendaftar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="/admin/manajemen/member" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-body">
           
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{$row->nip}}" id="username" readonly name="username" placeholder="Masukan username">
              @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{$row->nama}}" id="nama" readonly name="nama" placeholder="Masukan nama">
                @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" value="{{$row->jenis_kelamin}}" id="jenis_kelamin" readonly name="jenis_kelamin" placeholder="Masukan jenis_kelamin">
              @error('jenis_kelamin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="agama">Agama</label>
            <input type="text" class="form-control @error('agama') is-invalid @enderror" value="{{$row->agama}}" id="agama" readonly name="agama" placeholder="Masukan agama">
            @error('agama')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{$row->email}}" id="email" readonly name="email" placeholder="Masukan email">
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="no_ponsel">No Ponsel</label>
          <input type="text" class="form-control @error('no_ponsel') is-invalid @enderror" value="{{$row->no_ponsel}}" id="no_ponsel" readonly name="no_ponsel" placeholder="Masukan no_ponsel">
          @error('no_ponsel')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{$row->alamat}}" id="alamat" readonly name="alamat" placeholder="Masukan alamat">
          @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
        <div class="form-group">
          <label for="sekolah">Sekolah</label>
          <input type="text" class="form-control @error('sekolah') is-invalid @enderror" value="{{$row->sekolah}}" id="sekolah" readonly name="sekolah" placeholder="Masukan sekolah">
          @error('sekolah')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control @error('password') is-invalid @enderror" value="12345678" id="password" readonly name="password" placeholder="Masukan password">
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
          
   
            <input type="hidden" class="form-control @error('pendaftaran_id') is-invalid @enderror" value="{{$row->id}}" id="pendaftaran_id" readonly name="pendaftaran_id" placeholder="Masukan pendaftaran_id">
         

          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Tambah</button>
            </div>
          </form>
          </div>
        </div>
      </div>
   
       <!--modal Edit-->
      <div class="modal fade" id="edit-data{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Status Pendaftar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="/admin/manajemen/registration/{{ $row->id }}">
              @method('patch')
              @csrf
            <div class="modal-body">
              <div class="form-group">
                <label for="status">status Pendaftar</label>
                      <select class="form-control  @error('status') is-invalid @enderror" value="{{$row->status}}" id="status" name="status">
                        <option value="">Pilih Status</option>
                        <option value="Terdaftar">Terdaftar</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="Pending">Pending</option>
                      </select>
                    @error('status')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              </div>
        
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Update</button>
            </div>
         
          </div>
        </div>
      </div>
    </form>
  </div>
    @endforeach
    
 
@endsection
@extends('admin.template')
@section('title', 'Validasi Setoran')
@section('content')



    <!-- DataTable with Hover -->
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Setoran</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Setoran</li>
        </ol>
        </div>

    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-body">
              <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Catatan!</h4>
                <p>
                  Untuk memastikan setoran anggota <strong>valid</strong> pastikan beberapa hal berikut :
                </p>
                <li> Pastikan nilai setoran dengan bukti transfer sama</li>
                <li> Pastikan Tanggal setoran dengan bukti transfer sama</li>
                <li> Pastikan Dana yang disetorkan sudah masuk ke rekening</li>
                <hr>
                <p class="mb-0">
                    Pastikan semua data di cek dengan benar dan tidak ada kesalahan
                </p>
              </div>
            </div>
          <br>
            @if (session('status'))

            <div class="alert alert-success alert-dismissible" role="alert">
              {{ session('status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
            @endif

            <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Jumlah Setoran</th>
                  <th>Jenis Setoran</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transaction as $data)
                    
          
                <tr>
                  <td>{{date('d-m-Y', strtotime($data->created_at))}}</td>
                  <td>{{$data->nama}}</td>
                  <td>@currency($data->jml_simpan)</td>
                  <td>@if ($data->jenis_simpanan == 1)
                  Simpanan Wajib
                  @elseif($data->jenis_simpanan == 2)
                  Simpanan Idul Fitri
                  @elseif($data->jenis_simpanan == 3)
                  Simpanan Khusus Gedung
                  @elseif($data->jenis_simpanan == 4)
                  Simpanan Gerakan Hari Koperasi
                  @elseif($data->jenis_simpanan == 5)
                  Simpanan Kredit
                  @elseif($data->jenis_simpanan == 6)
                  Simpanan IKPN
                  @endif</td>
             
                
                  <td>
                    @if ($data->status == 'Berhasil')
                    <span class="badge badge-success">{{$data->status}}</span>
                  @elseif($data->status == 'Ditolak')
                  <span class="badge badge-danger">{{$data->status}}</span>
                  @elseif($data->status == 'Pending')
                  <span class="badge badge-info">{{$data->status}}</span>
                  @else
                  <span class="badge badge-warning">Belum Diverifikasi</span>
                @endif
                  </td>
                  <td>
                    @if ($data->status == 'Berhasil')
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah-data{{$data->id}}">
                      <i class="fas fa-plus"></i>
                      </button>
                  @elseif($data->status == 'Ditolak')
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail-data{{$data->id}}"  disabled>
                    <i class="fas fa-plus"></i>
                    </button>
                  @elseif($data->status == 'Pending')
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail-data{{$data->id}}"  disabled>
                    <i class="fas fa-plus"></i>
                    </button>
                  @else
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail-data{{$data->id}}"  disabled>
                    <i class="fas fa-plus"></i>
                    </button>
                @endif
                    
                    
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
          </div>


          @foreach ($transaction as $data)
          <!--modal Detail-->
          <div class="modal fade" id="detail-data{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Setoran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <div class="card">            
                  <img src="{{ asset ($data->foto) }}" class="card-img-top">
                </div>
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="edit-data{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Status Pendaftar</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="/admin/validasi/transaction/{{ $data->id }}">
                  @method('patch')
                  @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="status">status Pendaftar</label>
                          <select class="form-control  @error('status') is-invalid @enderror"  id="status" name="status">
                            <option value="">{{$data->status}}</option>
                            <option value="Berhasil">Berhasil</option>
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

      <!--modal Tambah-->
      <div class="modal fade" id="tambah-data{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Data Akun Pendaftar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="/admin/validasi/deposit" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-body">
           
            <div class="form-group">
              <input type="hidden" class="form-control @error('id_transaksi') is-invalid @enderror" value="{{$data->id}}" id="id_transaksi" readonly name="id_transaksi" >
          </div>     
            <div class="form-group">
              <label for="id_anggota">Nama Anggota</label>
              <input type="hidden" class="form-control @error('id_anggota') is-invalid @enderror" value="{{$data->id_anggota}}" id="id_anggota" readonly name="id_anggota">
              <input type="text" class="form-control @error('id_anggota') is-invalid @enderror" value="{{$data->nama}}" id="id_anggota" readonly name="id_anggota">
          </div>     
          <div class="form-group">
            <label for="jml_simpan">Jumlah Setoran</label>
            <input type="number" class="form-control  @error('jml_simpan') is-invalid @enderror" value="{{$data->jml_simpan}}"id="jml_simpan" readonly name="jml_simpan" >
        </div>
          <div class="form-group">
            <input type="hidden" class="form-control  @error('kd_simpanan') is-invalid @enderror" value="{{$data->jenis_simpanan}}"id="kd_simpanan" readonly name="kd_simpanan" >
        </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Tambah</button>
            </div>
          </form>
          </div>
        </div>
      </div>

    @endforeach
        </div>
      </div>
    <!--Row-->
</div>
@endsection
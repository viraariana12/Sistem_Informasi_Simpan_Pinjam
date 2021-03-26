@extends('anggota.template')
@section('title', 'Setoran')
@section('content')

    <!-- DataTable with Hover -->
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Setoran</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/index')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Setoran</li>
        </ol>
        </div>

    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-body">
              <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Catatan!</h4>
                <p>
                  Untuk melakukan setoran, anggota harap memastikan beberapa hal berikut :
                </p>
                <li> Pastikan nilai setoran dengan bukti transfer sama</li>
                <li> Pastikan Tanggal setoran dengan bukti transfer sama</li>
                <li> Pastikan semua data di cek dengan benar dan tidak ada kesalahan</li>
              </div>
            </div>
          
                    <div class="container mt-5">
                    <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambah"
                      id="#myBtn">
                      <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                      </span>
                      <span class="text">Tambah Setoran</span>
                    </button>
                  </div>
          
                <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Data Setoran</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="post" action="/admin/validasi/transaction" enctype="multipart/form-data">
                    <div class="modal-body">
                      @csrf
                      <div class="form-group">
                        <label for="username">NIP</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{$user->nip}}" id="username" name="username" readonly>
                        @error('username')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control  @error('nama') is-invalid @enderror" value="{{$user->nama}}" id="nama" name="nama"readonly>
                      @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                    <div class="form-group">
                      <label for="jenis_simpanan">Jenis Simpanan</label>
                      <select class="form-control  @error('jenis_simpanan') is-invalid @enderror" id="jenis_simpanan" name="jenis_simpanan">
                        <option>Pilih Jenis Simpanan..</option>
                        @foreach ($jenis as $item)
                        <option value="{{$item->id}}">{{$item->jenis_simpanan}}</option>
                        @endforeach
                        
                      </select>
                      @error('jenis_simpanan')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  <div class="form-group">
                      <label for="jml_simpan">Masukan Jumlah Setoran</label>
                      <input type="number" class="form-control  @error('jml_simpan') is-invalid @enderror" value="{{ old('jml_simpan') }}"id="jml_simpan" name="jml_simpan" placeholder="Masukan Jumlah Setoran">
                      @error('jml_simpan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                      <label for="foto">Masukan Bukti Transfer</label>
                      <input type="file" class="form-control-file  @error('foto') is-invalid @enderror" value="{{ old('foto') }}"id="foto" name="foto" placeholder="Masukan Jumlah Setoran">
                      @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <input type="hidden" class="form-control  @error('status') is-invalid @enderror" value="Belum Diverifikasi" id="status" name="status"readonly>
                  <input type="hidden" class="form-control  @error('status') is-invalid @enderror" value="{{$user->id}}" id="id_anggota" name="id_anggota"readonly>
                  <input type="hidden" class="form-control  @error('status') is-invalid @enderror" rand(); id="no_transaksi" name="no_transaksi"readonly>
      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                  </div>
                </div>
              </form>
              </div>
           
        
            <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>Tanggal</th>
                  <th>Jenis Simpanan</th>
                  <th>Jumlah Setoran</th>
                  <th>Bukti Pembayaran</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transaksi as $data)
                <tr>
                <td>{{date('d-m-Y', strtotime($data->created_at))}}</td>
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
                  @endif
                </td>
                <td>@currency($data->jml_simpan)</td>
                <td>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#detail-data{{$data->id}}">
                    <i class="far fa-eye"></i>
                    </button>
                </td>
                <td>
                 @if ($data->status == 'Berhasil') 
                  <span class="badge badge-success">Berhasil</span>
                @elseif($data->status == 'Ditolak') 
                <span class="badge badge-danger">Gagal</span>
                @else 
                <span class="badge badge-warning">Belum Diverifikasi</span>
              @endif 
            </td>
                </tr>
                @endforeach      
              </tbody>
            </table>
          </div>
          @foreach ($transaksi as $data)
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
            <img src="{{ asset($data->foto)  }}" class="card-img-top">
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


        </div>
      </div>
    <!--Row-->
</div>
@endforeach 
@endsection
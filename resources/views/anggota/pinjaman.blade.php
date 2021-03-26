@extends('anggota.template')
@section('title', 'Pinjaman')
@section('content')



    <!-- DataTable with Hover -->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Pinjaman</h1>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('anggota/dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pinjaman</li>
      </ol>
      </div>



    <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card mb-4">
            <div class="card-body">
              <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Catatan!</h4>
                <p>
                  Untuk melakukan angsuran maupun pengajuan, anggota dapat memastikan beberapa hal berikut :
                </p>
                <li> Nilai pinjaman maksimal 15% dari simpanan</li>
                <li> Pastikan Nomer rekening anggota benar</li>
                <li> Konfirmasi jika dana sudah masuk ke rekening anggota</li>
                <li>Pastikan semua data di cek dengan benar dan tidak ada kesalahan</li>
              </div>
         <!-- Modal tambah -->
          <div class="container mt-5">
              <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambah"
                id="#myBtn">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Pengajuan</span>
              </button>
            </div>
    
          <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Pengajuan Pinjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="/admin/validasi/application" enctype="multipart/form-data">
              <div class="modal-body">
                @csrf
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{$data->member->nip}}</li>
              <li class="list-group-item">{{$data->member->nama}}</li>   
              <li class="list-group-item">Maksimal Pinjaman : @currency($pinjaman)</li>
            </ul>            
            <br>    
            <div class="form-group">
              <label for="jml_pinjam">Masukan Jumlah Pinjaman</label>
              <input type="text" class="form-control  @error('jml_pinjam') is-invalid @enderror" value="{{ old('jml_pinjam') }}"id="jml_pinjam" name="jml_pinjam" placeholder="Masukan Jumlah Pinjaman">
              @error('jml_pinjam')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
   
              <div class="form-group">
                <label for="jml_anggsuran">Jumlah Anggsuran</label>
                <select class="form-control @error('jml_anggsuran') is-invalid @enderror" id="jml_anggsuran" name="jml_anggsuran">
                  <option value="">Pilih Jumlah Angsuran </option>
                  <option value="5">5</option>
                  <option value="10">10</option>
                  <option value="15">15</option>
                  <option value="20">20</option>
                </select>
                @error('jml_anggsuran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>

              <ul class="list-group list-group-flush">
               <li>Bunga Pinjaman : 5%</li>
              </ul>        
              <div class="form-group">
                <label for="bunga">Bunga Pinjaman</label>
                <input type="text" class="form-control  @error('bunga') is-invalid @enderror" value="10" id="bunga" name="bunga" readonly>
                @error('bunga' )
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <input type="hidden" class="form-control  @error('bunga') is-invalid @enderror" value="{{$data->member->id}}" id="id_anggota" name="id_anggota" readonly>
            <input type="hidden" class="form-control  @error('bunga') is-invalid @enderror" value="{{$data->member->id}}" id="id_simpanan" name="id_simpanan" readonly>
            <input type="hidden" class="form-control  @error('bunga') is-invalid @enderror" value="Belum Diverifikasi" id="status" name="status" readonly>
            <input type="hidden" class="form-control  @error('bunga') is-invalid @enderror" value="-" id="keterangan" name="keterangan" readonly>
            <input type="hidden" class="form-control  @error('bunga') is-invalid @enderror" value="{{$pinjaman}}" id="pinjaman" name="pinjaman" readonly>
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
                  <th>Tanggal</th>
                  <th>Jumlah Pinjaman</th>
                  <th>Angsuran</th>
                  <th>Jumlah Pinjaman + bunga</th>
                  <th>Status</th>
                  <th>keterangan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($riwayat as $item)
                <tr>
                  <td>{{date('d-m-Y', strtotime($data->created_at))}}</td>
                  <td>@currency($item->jml_pinjam)</td>
                  <td>{{$item->jml_anggsuran}}</td>
                  <td>@currency($item->total)</td>
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
               <td>{{$item->keterangan}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <!--Row-->
  </div>
</div>

     

<!-- Modal Edit -->


@endsection
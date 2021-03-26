@extends('admin.template')
@section('title', 'Validasi Pinjaman')
@section('content')



    <!-- DataTable with Hover -->
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengajuan Pinjaman</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Pengajuan Pinjaman</li>
        </ol>
        </div>

    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-body">
              <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Catatan!</h4>
                <p>
                  Untuk memastikan pengajuan anggota <strong>valid</strong> pastikan beberapa hal berikut :
                </p>
                <li> Nilai pinjaman maksimal 15% dari simpanan</li>

                <hr>
                <p class="mb-0">
                    Pastikan semua data di cek dengan benar dan tidak ada kesalahan
                </p>
              </div>
            </div>
          

            <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>Tanggal</th>
                  <th>NIP</th>
                  <th>Jumlah Pinjaman</th>
                  <th>Angsuran</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pinjaman as $data)
                <tr>
                  <td>{{date('d-m-Y', strtotime($data->created_at))}}</td>
                  <td>{{$data->member->nip}}</td>
                  <td>@currency($data->jml_pinjam)</td>
                  <td>{{$data->jml_anggsuran}}</td>
              
                  <td> @if ($data->status == 'Berhasil')
                    <span class="badge badge-success">{{$data->status}}</span>
                  @elseif($data->status == 'Ditolak')
                  <span class="badge badge-danger">{{$data->status}}</span>
                  @elseif($data->status == 'Pending')
                  <span class="badge badge-info">{{$data->status}}</span>
                  @else
                  <span class="badge badge-warning">Belum Diverifikasi</span>
                @endif
              </td>
                  <td>{{$data->keterangan}}</td>
                  <td> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#detail-data{{$data->id}}">
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

          @foreach ($pinjaman as $data)
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
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$data->member->nip}}</li>
                    <li class="list-group-item">{{$data->member->nama}}</li>
                    <li class="list-group-item">{{$data->member->jenis_kelamin}}</li>
                    <li class="list-group-item">{{$data->member->agama}}</li>
                    <li class="list-group-item">{{$data->member->alamat}}</li>
                    <li class="list-group-item">{{$data->member->sekolah}}</li>
                    <li class="list-group-item">{{$data->member->no_ponsel}}</li>   
                    <li class="list-group-item">Maksimal Pinjaman : @currency($data->pinjaman)</li>
                    <li class="list-group-item">Jumlah Pinjaman + bunga : @currency($data->total)</li>

                  </ul>         
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
                <form method="POST" action="/admin/validasi/application/{{ $data->id }}">
                  @method('patch')
                  @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="status">status Pinjaman</label>
                          <select class="form-control  @error('status') is-invalid @enderror"  id="status" name="status">
                            <option value="">{{$data->status}}</option>
                            <option value="Berhasil">Berhasil</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Pending">Pending</option>
                          </select>
                        @error('status')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror

                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" rows="3">{{ $data->keterangan }}</textarea>
                  </div>
                  
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
        </div>
      </div>
    <!--Row-->
</div>
@endsection
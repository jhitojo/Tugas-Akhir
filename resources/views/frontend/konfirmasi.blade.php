@extends('frontend.layout')

<!-- @section('title','Tukuemas || HOME Page') -->

@section('content')
<div class="col-md-6 m-auto">
  @if(session('sukses'))
  <div class="alert alert-success mt-3">
    {{session('sukses')}}
  </div>
  @endif
  @if(!empty($order))

      
      @if($order->status_cod == 1)
      <div class="card mt-3">
        <div class="card-header">
          <h5>Informasi Cod</h5>
        </div>
        <div class="card-body">
          <p class="card-text">
            Status COD <strong>Belum Mengajukan Pertemuan</strong>
          </p>
          <form action="{{ url('konfirmasiyes') }}" method="POST">
            {{csrf_field()}}
            <input  type="hidden" value="2" id="defaultCheck1" name="status_cod">
            <!-- <div class="form-check">
              <input class="form-check-input" type="checkbox" value="2" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                Minta Ketemuan
              </label>
            </div> -->
           
            <button type="submit" class="btn btn-primary">Ajukan</button>
          </form>
         
      @elseif($order->status_cod == 2)
      <div class="card mt-3">
      <div class="card-header">
        <h5>Informasi Cod</h5>
      </div>
      <div class="card-body">
        <p class="card-text">
          Status COD <strong>Sudah Mengajukan Pertemuan. Menunggu Konfirmasi </strong>
        </p>
        
      @else($order->status_cod == 3)
      <p class="p-2 bg-success w-100 text-white text-center"><i class="fas fa-check mr-2"></i> Transaksi Sukses
      </p>
      @endif
    </div>
  </div>
  @else
  <div class="card mt-3">
    <div class="card-header">
      <h5>Tidak Ada Tagihan</h5>
    </div>
  </div>
  @endif
</div>

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('upload-bukti-pembayaran') }}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <input type="file" class="form-control-file" name="bukti_pembayaran">
          </div>
          <button type="submit" class="btn btn-primary">Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

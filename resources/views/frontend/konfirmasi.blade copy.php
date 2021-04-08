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
  <div class="card mt-3">
    <div class="card-header">
      <h5>Informasi Pembayaran</h5>
    </div>
    <div class="card-body">
      <p class="card-text">
        Ajukan Permintaan Cod
        <form action="{{ url('konfirmasiyes') }}" method="POST" >
        {{csrf_field()}}
        <div class="form-group">
          <input type="hidden" name="status_cod" value="Minta Ketemuan" />
          <!-- <input type="file" class="form-control-file" name="bukti_pembayaran"> -->
        </div>
        <button type="submit" class="btn btn-primary">Minta Ketemuan</button>
      </form>
      </p>
     
      @if($order->status_cod == '1')
      <form action="{{ url('konfirmasiyes') }}" method="POST" >
        {{csrf_field()}}
        <!-- <div class="form-check">
          <input class="form-check-input" type="checkbox" value="2" id="defaultCheck1">
          <label class="form-check-label" for="defaultCheck1">
            Minta Ketemuan
          </label>
        </div> -->
        <div class="form-group">
          <input type="hidden" name="status_cod" value="2" />
          <!-- <input type="file" class="form-control-file" name="bukti_pembayaran"> -->
        </div>
        <button type="submit" class="btn btn-primary">Minta Ketemuan</button>
      </form>
      <!-- <button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#uploadModal">
        Minta Ketemuan
      </button> -->
  
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


@endsection

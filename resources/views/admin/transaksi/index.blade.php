@extends('admin.layouts.master')

@section('main-content')

<div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
         </div>
     </div>
     @if(session('sukses'))
  <div class="alert alert-success text-center">
    {{session('sukses')}}
  </div>
  @endif
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Transaksi Lists</h6>
      
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered">
      <tr class="text-center">
        <th>No.
        
        </th>
        <th>Tanggal Transaksi</th>
        <th>User</th>
        <th>Total Harga</th>
        <th>Status COD</th>
        <th>Status Pembayaran</th>
        <th>Detail</th>
      </tr>

      @foreach ($order as $p)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{date('d-M-Y, h:s', strtotime($p->tanggal))}}</td>
        <td>{{$p->user->name}}</td>
        <td>Rp. {{ number_format($p->total_harga) }}</td>

        <td>
          @if($p->status_cod == 1)
          <button class="btn btn-warning btn-xs w-100 mb-2 disabled">
            Pelanggan Belum Minta Ketemu
          </button>
          </form>
          @elseif ($p->status_cod == 2)
          <form action="transaksi/konfirmasi-cod/{{$p->id}}" method="post">
            {{ csrf_field() }}
            <p class="text-success text-xs text-center mb-2"><i class="fas fa-check mr-2"></i>Minta Ketemu</p>
            <!-- <a href=" https://api.whatsapp.com/send?phone={{$p->no_wa}}&text=tes"></a> -->
            <button type="button"  class="btn btn-warning btn-xs w-100 mb-2" data-toggle="modal" data-target="#exampleModal">
              Hubungi
            </button>
            <button type="hidden" name="status_cod" value="3" class="btn btn-warning btn-xs w-100 mb-2">
              Sudah Bertemu
            </button>
          </form>
         
          @else
          <form action="transaksi/konfirmasi-cod/{{$p->id}}" method="post">
            {{ csrf_field() }}
            <p class="text-success text-xs text-center mb-2"><i class="fas fa-check mr-2"></i>Sudah Bertemu</p>
          </form>
          @endif
        </td>

        <td>
          @if ($p->status_pembayaran == 0)
          <form action="transaksi/konfirmasi-transaksi/{{$p->id}}" method="post">
            {{ csrf_field() }}
            <button type="hidden" name="status_pembayaran" value="1" class="btn btn-warning btn-xs w-100 mb-2">
              Konfirmasi
            </button>
          </form>
          @else
          <p class="text-success text-xs text-center mb-2"><i class="fas fa-check mr-2"></i>Dikonfirmasi</p>
          <form action="transaksi/batal-konfirmasi-transaksi/{{$p->id}}" method="post">
            {{ csrf_field() }}
            <button type="hidden" name="status_pembayaran" value="0" class="btn btn-danger btn-xs w-100 mb-2">
              Batal
            </button>
          </form>
          @endif
        </td>
        <td>
          <a href="/transaksi/transaksi-detail/{{$p->id}}" class="btn btn-success btn-xs">Detail Pesanan</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @foreach ($kontak_wa as $wa)
        <p>{{$wa->isi_pesan}}</p> <a href=" https://api.whatsapp.com/send?phone={{$p->user->no_wa}}&text={{$wa->isi_pesan}}">Kirim</a>
      @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


@endsection
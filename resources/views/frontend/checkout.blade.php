@extends('frontend.layout2')

@section('title','Tukuemas || Checkout')

@section('content')
<div class="container-fluid mt-5">
    <div class="p-lg-5">
        <div class="row">
            <div class="col-md-12 m-auto">
                @if(session('sukses'))
                <div class="alert alert-danger mt-3">
                    {{session('sukses')}}
                </div>
                @endif
                @if(!empty($order))
                <div class="card mt-3 mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Detail Pesanan</h4>
                        <p align="right">Tanggal Pesan: {{date('d M Y', strtotime($order->tanggal))}}</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Produk</th>
                                    <th>Harga Sewa</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order_detail as $pd)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $pd->product->name }}</td>
                                    <td>Rp. {{ number_format($pd->product->price) }}</td>
                                    <td>{{ $pd->jumlah }}</td>
                                    <td>Rp. {{ number_format($pd->jumlah_harga) }}</td>
                                    <td>
                                        <form action="{{url('checkout')}}/{{$pd->id}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Hapus order?');"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <th colspan="6">Total Harga</th>
                                    <th colspan="">Rp. {{ number_format($order->total_harga) }}</th>
                                    <td>
                                        <a href="{{ url('konfirmasi') }}" class="btn btn-sm btn-success ml-auto">Konfirmasi
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                        @if(empty($order))
                        <div class="row">
                            <div class="col-md-6 m-auto">

                                <div class="card mt-3 mb-3">
                                    <div class="card-header">
                                        <h6><i class="fas fa-shopping-cart mr-3"></i>Keranjang Belanja Kosong</h6>
                                    </div>
                                    <div class="card-body">
                                        <a href="/produk" class="btn btn-warning">Belanja Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
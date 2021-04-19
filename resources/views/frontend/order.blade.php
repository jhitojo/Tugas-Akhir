@extends('frontend.layout')
@extends('frontend.layout2')

@section('title','Tukuemas || Order')

@section('content')

<div class="container mt-5">
    <div class="p-lg-5">
        @if(session('sukses'))
        <div class="alert alert-success text-center">
            {{session('sukses')}}
        </div>
        @endif
        <div class="col-md-12 m-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Rincian Pesanan</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="rental-imgBox">
                                <img src="{{ asset('photos/'.$product->photo) }}" width="90%" alt="">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><h6 class="strong">Nama Produk</h6></td>
                                        <td>:</td>
                                        <td>{{$product->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><h6 class="strong">Stok</h6></td>
                                        <td>:</td>
                                        <td>{{$product->stock}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <form action=" {{ url('order') }}/{{$product->id}}" method="POST">
                                {{csrf_field()}}
                            
                                <!-- <input type="hidden" name="pesanan_milik" value="{{$product->user_id}}" /> -->
                                <div class="form-group pl-2 pr-2">
                                    <label for="jumlah"><h6 class="strong">Jumlah</h6></label>
                                    <input type="number" name="jumlah" required="required" class="form-control"
                                        placeholder="">
                                </div>

                                <button type="submit" class="btn btn-warning mt-3 ml-2">
                                    <i class="fas fa-shopping-cart mr-2"></i>Beli
                                </button>
                            </form>
                            <!-- <hr> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
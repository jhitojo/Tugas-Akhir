@extends('frontend.layout')

<!-- @section('title','Tukuemas || HOME Page') -->

@section('content')

<div class="container mb-4 mt-4">
    @if(session('sukses'))
    <div class="alert alert-success text-center">
        {{session('sukses')}}
    </div>
    @endif
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Rincian Pesanan</h4>
                <div class="row">
                    <div class="col-md-5 m-auto">
                        <div class="rental-imgBox">
                            <img src="{{ asset('photos/'.$product->photo) }}" alt="">
                        </div>
                    </div>

                    <div class="col-md-7">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama product</td>
                                    <td>:</td>
                                    <td>{{$product->name}}</td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
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
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" required="required" class="form-control"
                                    placeholder="">
                            </div>

                            <button type="submit" class="btn btn-warning mt-3 ml-2">
                                <i class="fas fa-shopping-cart mr-2"></i>Tambah ke Keranjang
                            </button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
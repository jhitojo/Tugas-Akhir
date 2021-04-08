@extends('frontend.layout')

@section('title','Tukuemas || HOME Page')

@section('content')
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-white">
    <div class="col-md-12 p-lg-5 mx-auto my-5">
        <img src="{{asset('/dist/img/logo.png')}}" style=" width:10%;" alt="" />
            <h1 class="display-4 font-weight-normal">Tukuemas</h1>
        <p class="lead font-weight-normal">Cari Emas - Ketemuan COD - Deal</p>
    <!-- <a class="btn btn-outline-secondary" href="#">Coming soon</a> -->
    </div>
</div>

<!--start Featured Product Area-->
<div class="featured-product section fix">
    <div class="container">
        <div class="shop-">
            <div class="row">
            @foreach($product as $p)
                <div class="col" id="product{{$p->id}}">
                    <div class="product-item fix mt-3">
                        <div class="product-img-hover">
                            <!-- Product image -->
                            <a href="details/{{$p->id}}" class="pro-image fix"><img src="{{asset('photos')}}/{{$p->photo}}" alt="product" height="250px" width="250px"/></a>
                            <!-- Product action Btn -->
                        </div>
                        <div class="pro-name-price-ratting">
                            <!-- Product Name -->
                            <div class="pro-name">
                                <a href="details/{{$p->id}}">{{$p->name}}</a>
                            </div>
                            <!-- Product Ratting -->
                            <div class="pro-ratting">
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star-half-o"></i>
                            </div>
                            <!-- Product Price -->
                            <div class="pro-price fix">
                                <p><span class="new"><span style="text-decoration: line-through;">N</span>{{$p->price}}</span></p>
                            </div>
                        </div>
                </div>
                <div>
                    <div class="product-icon">
                        <a class="btn btn-warning"  title="Masukkan ke Keranjang" href="{{route('cart.show',$p->id)}}">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <span >
                        <a class="btn btn-warning" href="{{route('cart.buy',$p->id)}}">Beli sekarang</a>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
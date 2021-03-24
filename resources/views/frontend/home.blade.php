@extends('frontend.layout')

@section('title','Tukuemas || HOME Page')

@section('content')
   
    </div>
    </div>
    </div>

    <!--start Featured Product Area-->
    <div class="featured-product section fix">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>New Collection</h2>
                    <div class="underline"></div>
                </div>
            </div>
                <div class="shop-">
                    <!-- Single Product Start -->
                    <div class="row">
                    @foreach($product as $p)
                    
                    <div class="col" id="product{{$p->id}}">
                        <div class="product-item fix">
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
                                <a class="btn btn-warning " href="{{route('cart.show',$p->id)}}"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                                <div>
                              <a class="btn btn-warning" href="{{route('cart.buy',$p->id)}}">BUY NOW</a>
                            </div>
                        </div>
                    </div><!-- Single Product End -->
                    
                        @endforeach
                        </div>
                </div>
                <br>
                    </div>
                </div>
            </div>
        </div>
        
    </div><!--End Featured Product Area-->
   
    @endsection
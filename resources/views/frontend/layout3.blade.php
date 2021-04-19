<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    @include('frontend.include.header')
    <style>
    html, body {
        margin:0;
        padding:0;
        height:100%;
    }

    .container {
        min-height: 100%;
        position:relative;
    }   
    
    </style>
</head>
<body>
@include('frontend.include.top-nav2')


<!-- @include('frontend.include.side-nav') -->


@yield('content')
@include('frontend.include.footer')



<script type="text/javascript" src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/checkout.js')}}"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Owl Carousel JS -->
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<!--countTo JS -->
<script type="text/javascript" src="{{asset('js/jquery.countTo.js')}}"></script>
<!-- mixitup JS -->
<script type="text/javascript" src="{{asset('js/jquery.mixitup.min.js')}}"></script>
<!-- magnific popup JS -->
<script type="text/javascript" src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<!-- Appear JS -->
<script type="text/javascript" src="{{asset('js/jquery.appear.js')}}"></script>
<!-- MeanMenu JS -->
<script type="text/javascript" src="{{asset('js/jquery.meanmenu.min.js')}}"></script>
<!-- Nivo Slider JS -->
<script type="text/javascript" src="{{asset('js/jquery.nivo.slider.pack.js')}}"></script>
<!-- Scrollup JS -->
<script type="text/javascript" src="{{asset('js/jquery.scrollup.min.js')}}"></script>
<!-- simpleLens JS --> <script type="text/javascript">
//                function test(a) {
//                    var pro = "#product"+$(a).data('id');
//                    var p = $(pro);
//                    var product = {
//                        product_id: $(a).data('id'),
//                        product_img : p.find('img').attr('src'),
//                        product_name: p.find('.pro-name').find('a').text(),
//                        product_price: p.find('.new').text()
//                    };
//
//                    console.log(product);
////
//                }
//                function cartItems() {
//                    for (var i in carts) {
//                        var product = JSON.parse(carts[i]);
//                        $("tbody").prepend('<tr id="tr-' + i + '" class="table-info"><td class="namedes"><imgsrc="'+product.img+'" /></td><td class="namedes"><h2><a href="#">'+product.name+'</a></h2><p>'+product.desc+'</p></td><td class="unit"><h5>&#8358;'+product.price+'</h5></td><td class="quantity"><div class="cart-plus-minus"><input type="text" value="1"><button type="submit" name="qty" ></button></div></td><td class="valu"><h5>'+product.price+'</h5></td><td class="acti"><button data-id="' + i + '" alt="Delete"' + i + '" onclick="delCart(this);" type="submit"><i class="fa fa-trash-o"></i></button></td></tr>');
//                    }
//                }
//
//                var operation = "A";
//                varselected_index = -1;
//                var carts = localStorage.getItem("pushes");
//                carts = JSON.parse(carts);
//                if (carts == null) carts = [];
//                cartItems();
//
//                function addCart(el) {
//                    var item_id = $(el).data('id');
//                    var div = $("#product"+item_id);
//
//                    var product = JSON.stringify({
//                        id: item_id,
//                        desc: 'teststestsetsetes',
//                        img :div.find('img').attr('src'),
//                        name: div.find('.pro-name').find('a').text(),
//                        price: div.find('.new').text()
//                    });
//
//                    carts.push(product);
//                    localStorage.setItem("pushes", JSON.stringify(carts));
//                    $(el).attr('disabled', true);
//                    alert('Added to cart');
//                }
//
//                function delCart(e) {
//                    var a = $(e).attr("data-id");
//                    var selected_index = parseInt(a);
//                    carts.splice(selected_index, 1);
//                    localStorage.setItem("pushes", JSON.stringify(carts));
//                    $('#tr-'+a).remove();
//                }
    $('.product-icon').find('a').click(function (event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr('href'),
            success:function(response){
                alert('items added');
                //console.log(response);

                }
        });
        return false;
    });




</script>
<script type="text/javascript" src="{{asset('js/jquery.simpleLens.min.js')}}"></script>
<!-- Price Slider JS -->
<script type="text/javascript" src="{{asset('js/jquery-price-slider.js')}}"></script>
<!-- WOW JS -->
<script type="text/javascript" src="{{asset('js/wow.min.js')}}"></script>
<script>
    new WOW().init();
</script>
<!-- Main JS -->
<script type="text/javascript" src="js/main.js"></script>
<!-- If you're using Stripe for payments -->



</body>

</html>
<nav class="navbar navbar-light bg-dark fixed-top ">
    <div class="container">
        <a class="navbar-brand text-white" href="/home">
            <img src="{{asset('/dist/img/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="" >
            Tukuemas
        </a>
        <span>
        <div class="navbar-nav ml-auto">
            <ul>
                @auth 
                    @if(Auth::user()->role=='admin')
                   
                            <i class="fa fa-user mr-1" style="color: #ffbd29;"></i> 
                            <a href="{{route('dashboard_admin.index')}}"  class="text-white" target="">Dashboard</a>
                            &nbsp
                    @else 
                       
                            <i class="fa fa-user mr-1 " style="color: #ffbd29;"></i> 
                            <a href="{{route('dashboard_seller.index')}}"  class="text-white" target="">Dashboard</a>
                            &nbsp 
                    @endif

                    <i class="fa fa-chart-line mr-1 " style="color: #ffbd29;"></i> 
                    <a href="/konfirmasi"  class="text-white" target="">Status Cod</a> &nbsp
                    <i class="fa fa-cart-plus mr-1 " style="color: #ffbd29;"></i> 
                    <a href="/checkoutq"  class="text-white" target="">Belanjaan</a>
                      

                        <i class="fa fa-power-off mr-1 ml-3" style="color: #ffbd29;"></i> 
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="text-white">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                  
                        </ul>
                @else
                   <ul class="mt-auto">
                   <i class="fa fa-power-off mr-1 " style="color: #ffbd29;"></i>
                        <a href="{{route('login')}}" class="text-white">Login / </a>
                        <a href="{{route('register')}} " class="text-white">Register</a>
                    </ul>
                        
                    
                @endauth
        </div>
        </span> 
    </div>
</nav>

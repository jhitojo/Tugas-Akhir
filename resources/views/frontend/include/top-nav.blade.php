<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('/dist/img/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            Tukuemas
        </a>
        <span>
            @if($user)
            <div class="float-right">
                Selamat Datang {{$user->name}}
                    <a class="btn-warning btn-sm" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                
            @else
                <h6><a  href="/login">Login</a> atau <a href="/register">Register</a></h6>
            @endif
        </span>
        
    </div>
</nav>

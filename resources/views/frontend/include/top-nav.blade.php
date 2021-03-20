
<div class="header-area">
    <div class="container">
        <div class="row pt-3">
            <div class="col-sm-6">
                <div class="log-link">
                    @if($user)
                        <h4>Welcome {{$user->name}}</h4>
                    @else
                        <p>Welcome visitor you can</p>
                        <h5><a href="/login">Login</a> or <a href="/signup">Create an account</a></h5><br>
                <a href="{{asset('/vendor-signup')}}" class="btn btn-sm btn-warning" role="button">BECOME A VENDOR</a>
                @endif
                </div>
            
            </div>
            <div class="col-sm-6">
                <div class="search float-right">
                    <input type="text" value="" placeholder="Search Here...." />
                    <button class="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                    <div class="logo text-center">
                        <!-- <a href="{{url('/')}}"> -->
                            <img src="{{asset('/dist/img/logo.png')}}" style=" width:10%;" alt="" />
                            <h1>Tukuemas</h1>
                            <h6>Cari Emas - Ketemuan COD - Deal</h6>
                        <!-- </a> -->
                    </div>
            </div>
        </div>
    </div>
</div>


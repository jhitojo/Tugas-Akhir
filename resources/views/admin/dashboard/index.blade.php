@extends('admin.layouts.master')

@section('title','Admin || Dashboard')

@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Dashboard</h6>
    </div>
    <div class="card-body">
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <?php
              $user = Auth::user();
              $pesanan = \App\Order::where('pesanan_milik',$user->id)->count();
            ?>
            @if(!empty($pesanan))
            <h3>{{$pesanan}}</h3>
            @else
            <h3>0</h3>
            @endif
            <p>Pesanan</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ url('transaksi') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <?php
              $produk = \App\Product::count();
            ?>
            @if(!empty($produk))
            <h3>{{$produk}}</h3>
            @else
            <h3>0</h3>
            @endif
            <p>Produk</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ url('product') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <?php
              $kategori = \App\Category::count();
            ?>
            @if(!empty($kategori))
            <h3>{{$kategori}}</h3>
            @else
            <h3>0</h3>
            @endif

            <p>Kategori</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ url('category') }}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <?php
              $user = \App\User::count();
            ?>
            @if(!empty($user))
            <h3>{{$user}}</h3>
            @else
            <h3>0</h3>
            @endif
            <p>User</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ url('user') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <?php
              $user = Auth::user();
              $kontakwa = \App\KontakWa::where('user_id',$user->id)->count();
            ?>
            @if(!empty($kontakwa))
            <h3>{{$kontakwa}}</h3>
            @else
            <h3>0</h3>
            @endif

            <p>Pesan Whatsapp</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ url('kontak_wa') }}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
</div>
@endsection

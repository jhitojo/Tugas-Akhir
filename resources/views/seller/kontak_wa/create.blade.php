@extends('seller.layouts.master')

@section('title','Seller || Create Category')

@section('main-content')

<div class="card">
    <h5 class="card-header">Tambah Pesan</h5>
    <div class="card-body">
      <form method="post" action="{{route('kontak_wa.store_seller')}}">
        {{csrf_field()}}
        <div class="form-group">
        <input type="hidden" name="user_id" value="{{$user->id}}" />
          <label for="inputTitle" class="col-form-label">Isi Pesan <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="isi_pesan" placeholder="Isi Pesan"  value="{{old('isi_pesan')}}" class="form-control">
          @error('isi_pesan')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection
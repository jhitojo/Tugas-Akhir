@extends('admin.layouts.master')

@section('title','Admin || Create User')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add User</h5>
    <div class="card-body">
      <form method="post" action="{{route('user.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Nama <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="name" placeholder="Enter Name"  value="{{old('name')}}" class="form-control">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Email <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="email" placeholder="Enter Email"  value="{{old('email')}}" class="form-control">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Password <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="password" placeholder="Enter Password"  value="{{old('password')}}" class="form-control">
          @error('password')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group"> 
            <label for="no_wa" class="col-form-label">{{ __('Nomer WhatsApp') }} <span class="text-danger">*</span></label>
            <!-- <div class="col-md-6"> -->
            <input id="no_wa" type="no_wa" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa" value="{{ old('no_wa') }}" required autocomplete="no_wa">

            @error('no_wa')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        <div class="form-group">
          <label for="role">Role <span class="text-danger">*</span></label>
          <select name="role" id="role" class="form-control">
              <option value="">--Select any Role--</option>
              <option value='admin'>Admin</option>
              <option value='seller'>Seller</option>
          </select>
        </div>

        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection
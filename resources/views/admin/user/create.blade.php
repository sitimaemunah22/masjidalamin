@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center mt-2 card-header-warning">Tambah data User</h4>

              </div>
              <div class="card-body">
                <form class="m-3" action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    
                    <div class="mt-3">
                      <label for="name" class="form-label">Nama</label>
                      <input value="{{ old('name') }}" type="text" class="form-control" name="name" id="name" required>
                        @if($errors->has('name'))
                          <div class="small text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                      <label for="username" class="form-label">username</label>
                      <input value="{{ old('username') }}" type="text" class="form-control" name="username" id="username" required>
                        @if($errors->has('username'))
                          <div class="small text-danger">{{ $errors->first('username') }}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="ketua">Ketua</option>
                            <option value="masyarakat">Masyarakat</option>
                        </select>
                          @if($errors->has('role'))
                            <div class="small text-danger">{{ $errors->first('role') }}</div>
                          @endif
                      </div>
                    <div class="mt-3">
                      <label for="email" class="form-label">Email</label>
                      <input value="{{ old('email') }}" type="email" class="form-control" name="email" id="email" required>
                        @if($errors->has('email'))
                          <div class="small text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                      <label for="password" class="form-label">Password</label>
                      <input value="{{ old('password') }}" type="password" class="form-control" name="password" id="password" required>
                        @if($errors->has('password'))
                          <div class="small text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-success mt-3 ">Submit</button>
                  </form> 
              </div>     
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-css')

@endsection
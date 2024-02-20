@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <form class="m-3" method="POST" action="{{ route('donatur.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3 form-group">
                      <label for="id" class="form-label">Id Donatur</label>
                      <input type="integer" class="form-control" id="id_donatur" name="id_donatur" required>
                    </div>

                    <div class="mt-3 form-group">
                      <label for="nama" class="form-label">Nama Donatur</label>
                      <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mt-3 form-group">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="mt-3 form-group">
                      <label for="no_telephone" class="form-label">Nomor Telepon</label>
                      <input type="text" class="form-control" id="no_telephone" name="no_telephone" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    </div>
                    <div class="mt-3 form-group">
                      <label for="file_upload" class="form-label">Upload file</label>
                      <input type="file" class="form-control" id="file_upload" name="file_upload" required>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                  </form>      
            </div>
        </div>
    </div>
</div>
@endsection

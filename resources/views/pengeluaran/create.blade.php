@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h4 class="text-center mt-2">Tambah data Pengeluaran</h4>

                
                <form class="m-3" method="POST" action="{{ route('pengeluaran.store') }}" enctype="multipart/form-data">
                    @csrf

                    
                    <div class="mt-3 form-group">
                      <label for="id" class="form-label">Id Pengeluaran</label>
                      <input type="integer" class="form-control" name="id_pengeluaran" id="id_pengeluaran" required>
                    </div>
                    
                    <div class="mt-3">
                      <label for="jenis" class="form-label">Id Jenis</label>
                      <select class="form-control" id="sel1" name="jenis_id" required>
                        @foreach ($jenis as $data)
                          <option value="{{ $data->id_jenis }}">{{ $data->id_jenis }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('jenis_id'))
                          <div class="small text-danger">{{ $errors->first('jenis_id') }}</div>
                        @endif
                    </div>

                    <div class="mt-3">
                      <label for="exampleInputEmail1" class="form-label">Tanggal Pengeluaran</label>
                      <input type="datetime-local" class="form-control" name="tanggal_pengeluaran" id="tanggal_pengeluaran" required>
                    </div>
                    <div class="mt-3">
                      <label for="jumlah_pengeluaran" class="form-label">Jumlah Pengeluaran</label>
                      <input type="number" class="form-control" id="jumlah_pengeluaran" name="jumlah_pengeluaran" placeholder="1000000" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    </div>
                    <div class="mt-3">
                      <label for="file_upload" class="form-label">Upload File</label>
                      <input type="file" class="form-control" name="file_upload" id="file_upload" required>
                    </div>
                    
                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                  </form> 
                </div>     
            </div>
        </div>
    </div>
</div>
@endsection

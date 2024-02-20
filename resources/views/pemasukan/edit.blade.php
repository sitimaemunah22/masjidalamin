@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center mt-2 card-header-warning">Edit data Pemasukan</h4>

              </div>
              <div class="card-body">
                <form class="m-3" action="{{ route('pemasukan.update',['id'=>$pemasukan->id_pemasukan]) }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  



                  <div class="mt-3">
                      <label for="id" class="form-label">Id pemasukan</label>
                      <input type="integer" class="form-control" name="id_pemasukan" id="id_pemasukan" placeholder="{{ $pemasukan->id_pemasukan }}" value="{{ $pemasukan->id_pemasukan }}">
                        <!-- @if($errors->has('id_pemasukan'))
                          <div class="small text-danger">{{ $errors->first('id_pemasukan') }}</div>
                        @endif -->
                    </div>

                    <div class="mt-3">
                      <label for="exampleInputEmail1" class="form-label">Id Donatur</label>
                      <select class="form-control" id="sel1" name="id_donatur" value="{{ $pemasukan->id_donatur }}">
                        @foreach ($donatur as $donatur_data)
                          <option value="{{ $donatur_data->id_donatur }}">{{ $donatur_data->id_donatur }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('id_donatur'))
                          <div class="small text-danger">{{ $errors->first('id_donatur') }}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                      <label for="exampleInputEmail1" class="form-label">Id Jenis</label>
                      <select class="form-control" id="sel1" name="id_jenis" required>
                        @foreach ($jenis as $data)
                          <option value="{{ $data->id_jenis }}">{{ $data->id_jenis }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('id_jenis'))
                          <div class="small text-danger">{{ $errors->first('id_jenis') }}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                      <label for="tanggal_pemasukan" class="form-label">Tanggal Pemasukan </label>
                      <input value="{{ $pemasukan->tanggal_pemasukan }}" type="datetime-local" class="form-control" name="tanggal_pemasukan" id="tanggal_pemasukan" required>
                        @if($errors->has('tanggal_pemasukan'))
                          <div class="small text-danger">{{ $errors->first('tanggal_pemasukan') }}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                      <label for="jumlah_pemasukan" class="form-label">Jumlah pemasukan</label>
                      <input type="number" class="form-control" name="jumlah_pemasukan" id="jumlah_pemasukan" placeholder="{{ $pemasukan->jumlah_pemasukan }}" required onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ $pemasukan->jumlah_pemasukan }}">
                        @if($errors->has('jumlah_pemasukan'))
                          <div class="small text-danger">{{ $errors->first('jumlah_pemasukan') }}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                      <label for="file_upload" class="form-label">Upload File</label>
                      <input type="file" class="form-control" name="file_upload" id="file_upload" >
                        @if($errors->has('file_upload'))
                          <div class="small text-danger">{{ $errors->first('file_upload') }}</div>
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
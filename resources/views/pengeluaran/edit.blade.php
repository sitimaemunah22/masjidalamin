@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center mt-2 card-header-warning">Edit data pengeluaran</h4>

              </div>
              <div class="card-body">
                <form class="m-3" action="{{ route('pengeluaran.update',['id'=>$pengeluaran->id_pengeluaran]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mt-3">
                      <label for="exampleInputEmail1" class="form-label">Id Pengeluaran</label>
                      <input type="text" name="id_pengeluaran" class="form-control" value="{{ $pengeluaran->id_pengeluaran}}">
                      @if($errors->has('pengeluaran_id'))
                          <div class="small text-danger">{{ $errors->first('id_pengeluaran') }}</div>
                        @endif
                    </div>
                  
                    <div class="mt-3">
                      <label for="exampleInputEmail1" class="form-label">Id Jenis</label>
                      <select class="form-control" id="sel1" name="id_jenis" value="{{ $pengeluaran->id_jenis}}">
                        @foreach ($jenis as $data)
                        <div class="small text-denger">{{ $errors->first('id_jenis')}}</div>
                          <option value="{{ $data->id_jenis }}">{{ $data->id_jenis }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('jenis_id'))
                          <div class="small text-danger">{{ $errors->first('jenis_id') }}</div>
                        @endif
                    </div>
                    
                    <!-- <div class="mt-3">
                      <label for="donatur_id" class="form-label">Donatur</label>
                      <select class="form-control" id="sel1" name="donatur_id" required>
                        @foreach ($donatur as $donaturs)
                          <option value="{{ $donaturs->id_donatur }}">{{ $donaturs->nama }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('donatur_id'))
                          <div class="small text-danger">{{ $errors->first('donatur_id') }}</div>
                        @endif
                    </div> -->


                    <div class="mt-3">
                      <label for="tanggal_pengeluaran" class="form-label">Tanggal pengeluaran </label>
                      <input value="{{ $pengeluaran->tanggal_pengeluaran }}" type="datetime-local" class="form-control" name="tanggal_pengeluaran" id="tanggal_pengeluaran" required>
                        @if($errors->has('tanggal_pengeluaran'))
                          <div class="small text-danger">{{ $errors->first('tanggal_pengeluaran') }}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                      <label for="jumlah_pengeluaran" class="form-label">Jumlah pengeluaran</label>
                      <input type="number" class="form-control" name="jumlah_pengeluaran" id="jumlah_pengeluaran" value="{{ $pengeluaran->jumlah_pengeluaran }}" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        @if($errors->has('jumlah_pengeluaran'))
                          <div class="small text-danger">{{ $errors->first('jumlah_pengeluaran') }}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                      <label for="upload" class="form-label">Upload File</label>
                      <input type="file" class="form-control" name="upload" id="upload" value="{{ $pengeluaran->upload_file }}">
                        @if($errors->has('upload'))
                          <div class="small text-danger">{{ $errors->first('upload') }}</div>
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
@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center mt-2 card-header-warning">Detail data </h4>

              </div>
              <div class="card-body">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Id Donatur</td>
                        <td>:</td>
                        <td>{{ $donatur->id_donatur }}</td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $donatur->nama }}</td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $donatur->alamat }}</td>
                      </tr>
                      <tr>
                        <td>Nomor Telephone</td>
                        <td>:</td>
                        <td>{{ $donatur->no_telephone }}</td>
                      </tr>


                    </tbody>
                </table>   
                <a href="{{ url()->previous() }}" class="btn btn-success btn-sm mt-5">Kembali</a>
              </div>     
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-css')

@endsection
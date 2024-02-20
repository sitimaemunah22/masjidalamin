@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center mt-2 card-header-warning">Detail data pengeluaran</h4>

              </div>
              <div class="card-body">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Id Pemasukan</td>
                        <td>:</td>
                        <td>{{ $pengeluaran->id_pengeluaran }}</td>
                      </tr>
                      <tr>
                        <td>Id Jenis</td>
                        <td>:</td>
                        <td>{{ $pengeluaran->jenis->id_jenis }}</td>
                      </tr>
                      
                      <tr>
                        <td>Jumlah Pengeluaran</td>
                        <td>:</td>
                        <td>Rp {{ $pengeluaran->jumlah_pengeluaran }}</td>
                      </tr>
                      <tr>
                        <td>tanggal pengeluaran</td>
                        <td>:</td>
                        <td>{{ $pengeluaran->tanggal_pengeluaran }}</td>
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
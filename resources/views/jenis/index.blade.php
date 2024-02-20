@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Jenis Pengeluaran/Pemasukan<br>
                    <a href="{{ route('jenis.create') }}" class="btn btn-success btn-sm col-2 mt-2 {{ auth()->user()->role == 'masyarakat' ? 'd-none disabled' : '' }}"> Tambah Data</a>
                </div>
                <div class="card-body">
                    @if(Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ Session::get('message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id Jenis</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Nama</th>
                            <th scope="col" class="{{ auth()->user()->role == 'masyarakat' ? 'd-none' : '' }}">Option</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenis as $jenis)
                                <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $jenis->id_jenis }}</td>
                                @if($jenis->status == 2)
                                    <td>Pemasukan</td>
                                @else
                                    <td>Pengeluaran</td>
                                @endif
                                <td>{{ $jenis->nama }}</td>
                                <td class="d-flex">
                                    <a href="{{ url('jenis', ['edit', $jenis->id_jenis]) }}" class="btn btn-success btn-sm m-1 {{ auth()->user()->role == 'masyarakat' ? 'd-none' : '' }}">Edit</a>
                                    <a href="{{ url('jenis', ['detail', $jenis->id_jenis]) }}" class="btn btn-success btn-sm m-1 {{ auth()->user()->role == 'masyarakat' ? 'd-none' : '' }}">detail</a>
                                    <form class="{{ auth()->user()->role != 'admin' ? 'd-none' : '' }}" method="POST" action="{{ route('jenis.delete', ['id' => $jenis->id_jenis]) }}">
                                        
                                        @csrf
                                
                                        <input type="submit" onclick="return confirm('Anda yakin akan menghapus data?')" class="btn btn-success btn-sm m-1" value="Delete">
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                          
                        </tbody>

                        
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

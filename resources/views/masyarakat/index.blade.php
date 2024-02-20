@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Session::get('login'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ Session::get('login') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                        <span aria-hidden="true" >&times;</span>
                      </button>
                    </div>
                    @endif


                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card" style="width: 100%;">
                                <div class="card-body bg-success">
                                <h5 class="card-title">Total Pemasukan Kas</h5>
                                <h1 class="card-text">Rp. {{ $nominal_pemasukan }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">              
                            <div class="card" style="width: 100%;">
                                <div class="card-body bg-danger">
                                <h5 class="card-title">Total Pengeluaran Kas</h5>
                                <h1 class="card-text">Rp. {{ $nominal_pengeluaran }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="card " style="width: 100%;">
                                <div class="card-body">
                                <h5 class="card-title">Total keuangan saat ini</h5>
                                <h1 class="card-text">Rp. {{ $current_kas }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('styles')
    <style>
        body {
            background-color: #167E1F; 
            background-image: url('{{ asset('image/bgmasjid.png') }}');
        } 

        .container {
            background-image: url('{{ asset('image/bgmasjid.png') }}'); /* Tautan relatif ke gambar */
            background-size: cover;
            background-position: center;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Pemasukan Kas Masjid <br>
                    <div class="d-flex">
                        <a href="{{ route('pemasukan.create') }}" class="btn btn-success btn-sm col-2 m-2 {{ auth()->user()->role == 'masyarakat' ? 'd-none disabled' : '' }}"> Tambah Data</a>
                        <a target="_blank" class="btn btn-success btn-sm col-2 m-2" href="{{ route('pemasukan.pdf') }}">Export to PDF</a>
                    </div>
                </div>
                <div class="card-body" style="overflow: auto;">
                    @if(Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ Session::get('message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    <table class="table table-striped" id="datatables">
                        <thead>
                          <tr>
                            <th scope="col">Id Pemasukan</th>
                            <th scope="col">Id Donatur</th>
                            <th scope="col">Id Jenis</th>
                            <th scope="col">Jumlah Pemasukan</th>
                            <th scope="col">Tanggal Pemasukan</th>
                            <th scope="col">Opsi</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                'url' : '{{ route('pemasukan.getData') }}',
                'data' : function(d){
                    // d.company_select = $('#company').val();
                }
            },
            // order: [5,'desc'],
            columns: [
                {data: 'id_pemasukan', name: 'id_pemasukan'},
                {data: 'id_donatur', name: 'id_donatur'},
                {data: 'id_jenis', name: 'id_jenis'},
                {data: 'jumlah_pemasukan', name: 'jumlah_pemasukan'},
                {data: 'tanggal_pemasukan', name: 'tanggal_pemasukan'},
                {data: 'opsi', name: 'opsi'},
            ]
        });

        // $('#company').change(function(){
        //     reloadTable('#datatable');
        // });
    })

    function reloadTable(idtable){
        var table = $(idtable).DataTable();
        table.cleanData;
        table.ajax.reload();
    }  
</script>

@endsection

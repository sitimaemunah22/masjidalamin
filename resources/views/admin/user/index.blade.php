@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar User <br>
                    <a href="{{ route('admin.user.create') }}" class="btn btn-success btn-sm col-2 mt-2"> Tambah Data</a>
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
                    <table class="table table-striped" id="datatables">
                        <thead>
                          <tr>
                            <th scope="col">Nama </th>
                            <th scope="col">Role </th>
                            <th scope="col">Username </th>
                            <th scope="col">Email </th>
                            <th scope="col">Opsi </th>

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
                'url' : '{{ route('admin.user.getData') }}',
                'data' : function(d){
                    // d.company_select = $('#company').val();
                }
            },
            // order: [5,'desc'],
            columns: [
                {data: 'name', name: 'name'},
                {data: 'role', name: 'role'},
                {data: 'username', name: 'username'},
                {data: 'email', name: 'email'},
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
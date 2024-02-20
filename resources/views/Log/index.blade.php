@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Log Aktivitas<br>
                </div>
                <div class="card-body">
                    
                    <table class="table table-striped" id="datatables">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">User Id</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Waktu</th>
                            
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
                'url' : '{{ route('log.getData') }}',
            },
            // order: [5,'desc'],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'user_id', name: 'user_id'},
                {data: 'keterangan', name: 'keterangan'},
                {data: 'time', name: 'time'},
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
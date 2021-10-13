

@extends('layouts.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Buyer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Buyer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
    @include('notify.errors')
    @include('notify.success')

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Buyer</h3>
                <div style="float:right;">
                <a href="{{route('buyer.add')}}" class="btn btn-primary btn-block">Add</a>

                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
<table class="table table-bordered data-table" style="    width: 100%;">
        <thead>
            <tr>
                <th></th>
                <th>No</th>
                <th>Code</th>
                <th>Domain</th>
                <th>Status</th>
                <th width="20%">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      </div>
      </div>

    </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
</section>
    <!-- /.content -->

@section('endfooter')

<style>

    #DataTables_Table_0_wrapper{
        width:100%;
    }
</style>
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        "info": true,
        "paging": true,
        "lengthChange": false,
        "autoWidth": false,
        ajax: "{{ route('buyer') }}",
        'select': {
         'style': 'multi'
      },
      dom: 'Bfrtip',
        buttons: [
            {
                text: 'Delete',
                className: 'btn btn-danger',
                action: function ( e, dt, node, config ) {
                    if(confirm( 'Are you sure do you want to delete selected items ?' )){
                      var rows_selected = table.column(0).checkboxes.selected();
                      $form = $("<form action='{{route('buyer.bulk_delete')}}' method='post'></form>");
                      $form.append('@csrf');
                      $.each(rows_selected, function(index, rowId){
                        $form.append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );

                      });
                      $('body').append($form);
                      $form.submit();

                    }
                }
            },
            {
                text: 'Disable',
                className: 'btn btn-secondary',
                action: function ( e, dt, node, config ) {
                  if(confirm( 'Are you sure do you want to disable selected items ?' )){
                    var rows_selected = table.column(0).checkboxes.selected();
                      $form = $("<form action='{{route('buyer.bulk_disable')}}' method='post'></form>");
                      $form.append('@csrf');
                      $.each(rows_selected, function(index, rowId){
                        $form.append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );

                      });
                      $('body').append($form);
                      $form.submit();
}                }
            },
            {
                text: 'Active',
                className: 'btn btn-primary',
                action: function ( e, dt, node, config ) {
                  if(confirm( 'Are you sure do you want to Activate selected items ?' )){
                    var rows_selected = table.column(0).checkboxes.selected();
                      $form = $("<form action='{{route('buyer.bulk_activate')}}' method='post'></form>");
                      $form.append('@csrf');
                      $.each(rows_selected, function(index, rowId){
                        $form.append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );

                      });
                      $('body').append($form);
                      $form.submit();
} 
                }
            }
        ],

      select: true,
      'order': [[1, 'asc']],
        columns: [
            {
     "data": 'id',
     name: 'id',
            },
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'code', name: 'code'},
            {data: 'domain', name: 'domain'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         }
      ],
    });
    
  });
</script>
@endsection
@endsection


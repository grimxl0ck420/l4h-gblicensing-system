

@extends('layouts.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Resellers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Resellers</li>
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

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Reseller</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('reseller.edit',$reseller->id)}}">
                  @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="token">Token</label>
                    <input type="text" class="form-control" readonly value="{{$reseller->token}}" name="token" id="token" placeholder="Token">
                  </div>
                  <div class="form-group">
                    <label for="name">Brand</label>
                    <input type="text" class="form-control" value="{{$reseller->name}}" name="name" id="name" placeholder="Brand">
                  </div>
                    <div class="form-group">
                    <label for="main_domain">Main Domain</label>
                    <input type="text" class="form-control" value="{{$reseller->main_domain}}" name="main_domain" id="main_domain" placeholder="Main Domain">
                  </div>
                  <div class="form-group">
                    <label for="domain">Domain</label>
                    <input type="text" class="form-control" value="{{$reseller->domain}}" name="domain" id="domain" placeholder="Domain">
                  </div>
                    <div class="form-group">
                    <label for="folder">Folder</label>
                    <input type="text" class="form-control" value="{{$reseller->folder}}" name="folder" id="folder" placeholder="Folder">
                  </div>
                   <div class="form-group" style="display:none;">
                    <label for="key_cmd">Key cmd</label>
                    <input type="text" class="form-control" value="gb"  name="key_cmd" id="key_cmd" placeholder="Key cmd">
                  </div>
                  <div class="form-group"  id="balance" @if($reseller->type == 'whmcs') style="display:none" @endif>
                    <label for="balance" >Balance</label>
                    <input type="number" step="0.1" data-decimals="1" class="form-control" value="{{$reseller->balance}}"  name="balance" id="balance" placeholder="Balance">
                  </div>

                  <div class="form-group">
                    <label for="end_at">End At</label>
                    <input type="text" class="form-control datetime" value="{{$reseller->end_at}}" name="end_at" id="end_at" placeholder="End At">
                  </div>
                 <div class="form-group">
                        <label>Type</label>
                        <select id="type" class="form-control" name="type">
                        <option value="local"  {{ $reseller->type == 'local' ? 'selected' : ''}}>Local</option>
                        <option value="whmcs" {{ $reseller->type == 'whmcs' ? 'selected' : ''}}>Whmcs</option>
                        </select>
                    </div> 
                 <!-- select -->
                 <div class="form-group">
                        <label>Reseller Level</label>
                        <select class="form-control" name="level">
                          <option value="" >None</option>
                          @foreach($levels as $level)
                            <option value="{{ $level->id }}" @if($reseller->level_id == $level->id) selected @endif >{{ $level->title }}</option>
                          @endforeach
                        </select>
                      </div> 
   <!-- select -->
                      <div class="form-group client_view" @if($reseller->type != 'whmcs') style="display:none" @endif>
                        <label>Clients</label>
                        <select class="form-control" style="width: 100%" id="getClients" name="client_id">
                        @if($reseller->client_id && $reseller->type == 'whmcs')
                          @php
                          $client = whmcs_get_client($reseller->client_id);
                          @endphp
                          @if($client)
                              <option value="{{$client['id']}}">{{$client['email']}}</option>
                          @endif
                          @else
                          $client = '';
                        @endif
                        </select>
                      </div> 
               
                 <!-- select -->
                 <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1" {{ $reseller->status == 1 ? 'selected' : ''}} >Active</option>
                          <option value="0" {{ $reseller->status != 1 ? 'selected' : ''}}>Disable</option>
                        </select>
                      </div> 
                      @if($reseller->client_id && $reseller->type == 'whmcs')

                  @if($client)

                  <p>
                      <b>
                  Balance : {{intval($client['credit'])}} 
                  </b>
                  </p>
                  @endif
                   <p>
                       <b>
                  All Licenses : {{count($licenses)}} 
                  </b>
                  </p>
                   <p>
                       <b>
                  Active Licenses : {{count($licenses_active)}} 
                  </b>
                  </p>
                  @foreach($active_softwares as $software)
                    <p><b> Active {{ ucfirst($software->name )}} License : {{count(\App\License::where('status',1)->where('reseller_id',$reseller->id)->where('end_at','>',date('Y-m-d'))->where('software_id',$software->id)->get())}} </b></p>
                    @endforeach
                  @endif

                </div>

                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            </div>

            </div>

            </div>

            <!-- /.card -->
      </div><!-- /.container-fluid -->
</section>


@endsection

@section('endfooter')
<script>
$(document).ready(function(){
  $('#type').change(function(e){
    if($(e.target).val() == 'whmcs'){
      $('.client_view').show();
      $('#balance').hide();

    }else{
      $('.client_view').hide();
      $('#balance').show();

    }
  });
  $( "#getClients" ).select2({
    minimumInputLength: 3,
  ajax: {
    url: "{{route('getClients')}}",
    dataType: 'json',
    type: 'GET',
      data: function (params) {

                    return {
                      term: params.term, // search term
                    };
                },
    processResults: function (data) {
                    var arr = []
                    $.each(data, function (index, value) {
                        arr.push({
                            id: value.id,
                            text: value.email
                        })
                    })
                    return {
                        results: arr
                    };
                },

}
});

});
</script>
@endsection

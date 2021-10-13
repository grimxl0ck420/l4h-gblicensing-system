

@extends('layouts.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Proxies</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Proxies</li>
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
                <h3 class="card-title">Edit Proxy</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('proxy.edit',$proxy->id)}}">
                  @csrf
                <div class="card-body">
					<div class="form-group">
                    <label for="backend_ip">Backend Ip</label>
                    <input type="text" class="form-control" value="{{$proxy->backend_ip}}" name="backend_ip" id="backend_ip" placeholder="Backend Ip">
                  </div>
					<div class="form-group">
                    <label for="backend_port">Backend Port</label>
                    <input type="text" class="form-control" value="{{$proxy->backend_port}}" name="backend_port" id="backend_port" placeholder="Backend Port">
                  </div>
                    <!-- type select -->
                  <div class="form-group">
                        <label>Backend Type</label>
                        <select class="form-control" name="backend_type">
                        @php
                        $type = ['socks4','socks5','http','https'];
                        @endphp
                          @if($type)
                          @foreach($type as $type_one)
                          <option value="{{$type_one}}" {{$type_one == $proxy->backend_type ? 'selected' : ''}}>{{$type_one}}</option>
                          @endforeach
                          @endif
                  </select>
                      </div> 
                <div class="form-group">
                    <label for="ip">Ip</label>
                    <input type="text" class="form-control" value="{{$proxy->ip}}" name="ip" id="ip" placeholder="Ip">
                  </div>
                   <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" value="{{$proxy->username}}" name="username" id="username" placeholder="Username">
                  </div>
                   <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" value="{{$proxy->password}}" name="password" id="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="port">Port</label>
                    <input type="text" class="form-control" value="{{$proxy->port}}" name="port" id="port" placeholder="Port">
                  </div>
                    <!-- type select -->
                  <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="type">
                        @php
                        $type = ['socks4','socks5','http','https'];
                        @endphp
                          @if($type)
                          @foreach($type as $type_one)
                          <option value="{{$type_one}}" {{$type_one == $proxy->type ? 'selected' : ''}}>{{$type_one}}</option>
                          @endforeach
                          @endif
                  </select>
                      </div> 
                      <div class="form-group">
                    <label for="expiry_date">Expiry date</label>
                    <input type="number" class="form-control" value="{{$proxy->expiry_date}}"  name="expiry_date_proxy" id="expiry_date" placeholder="Expiry date">
                  </div>
                 <!-- select -->
                 <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status_proxy">
                          <option value="1" {{ $proxy->status == 1 ? 'selected' : ''}} >Active</option>
                          <option value="0" {{ $proxy->status != 1 ? 'selected' : ''}}>Disable</option>
                        </select>
                      </div> 
                      <div class="softwares_add">
                      @if($proxySoftware)
                      @foreach($proxySoftware as $proxy_software)
                      <div class="software" style="padding-top:15px;">
                      <hr>
                      <div class="text-right" style="padding-top:15px;">
                  <a  class="btn btn-danger deleteSoftware"  href="javascript:void(0)">Delete</a>
                </div>
                
                    <input type="hidden" class="form-control"  value="{{$proxy_software->id}}"  name="software_proxy_id[]" >

                           <!-- Software select -->
                         <div class="form-group">
                        <label>Software</label>
                        <select class="form-control" name="software_id_old[]">
                          @if($softwares)
                          @foreach($softwares as $software)
                          <option value="{{$software->id}}" {{$proxy_software->software_id == $software->id ? 'selected' : ''}}>{{$software->name}}</option>
                          @endforeach
                          @endif
                        </select>
                      </div> 
                      <div class="form-group">
                    <label for="key">Key</label>
                    <textarea  class="form-control" rows="3" name="key_old[]"  id="key" placeholder="Key">{{$proxy_software->key}}</textarea>
                  </div>
                      <div class="form-group">
                    <label >Expiry date</label>
                    <input type="number" class="form-control" value="{{$proxy_software->expiry_date}}" name="expiry_date_old[]" id="expiry_date" placeholder="Expiry date">
                  </div>
                  <div class="form-group">
                    <label >Priority</label>
                    <input type="number" class="form-control" value="{{$proxy_software->priority}}"  name="priority_old[]" id="priority" placeholder="Priority">
                  </div>
                  <div class="form-group">
                    <label >Limit </label>
                    <input type="number" class="form-control"  value="{{$proxy_software->use}}"  name="limit_old[]" id="limit" placeholder="Limit">
                  </div>
                  <!-- select -->
                 <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status_old[]">
                        <option value="1" {{ $proxy_software->status == 1 ? 'selected' : ''}} >Active</option>
                          <option value="0" {{ $proxy_software->status != 1 ? 'selected' : ''}}>Disable</option>
                        </select>
                      </div> 
                      </div>
                    <p>
                    Used : {{$proxy_software->used}}
                    </p>
                      @endforeach
                      @endif
                  </div>
                      <!-- /.card-body -->
                <div class=" text-left" style="padding-top:15px;">
                  <a href="javascript:void(0)" class="btn btn-secondary" id="addSoftware">Add Software</a>
                </div>
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
    <!-- /.content -->
@endsection
@section('endfooter')
<script>
var text = `
<div class="software" style="padding-top:15px;">
                      <hr>
                      <div class="text-right" style="padding-top:15px;">
                  <a  class="btn btn-danger deleteSoftware"  href="javascript:void(0)">Delete</a>
                </div>
                           <!-- Software select -->
                         <div class="form-group">
                        <label>Software</label>
                        <select class="form-control" name="software_id[]">
                          @if($softwares)
                          @foreach($softwares as $software)
                          <option value="{{$software->id}}">{{$software->name}}</option>
                          @endforeach
                          @endif
                        </select>
                      </div> 
                      <div class="form-group">
                    <label for="key">Key</label>
                    <textarea  class="form-control" rows="3" name="key[]" id="key" placeholder="Key"></textarea>
                  </div>
                      <div class="form-group">
                    <label >Expiry date</label>
                    <input type="number" class="form-control" value="0" name="expiry_date[]" id="expiry_date" placeholder="Expiry date">
                  </div>
                  <div class="form-group">
                    <label >Priority</label>
                    <input type="number" class="form-control" value="1"  name="priority[]" id="priority" placeholder="Priority">
                  </div>
                  <div class="form-group">
                    <label >Limit </label>
                    <input type="number" class="form-control"  value="0"  name="limit[]" id="limit" placeholder="Limit">
                  </div>
                  <!-- select -->
                 <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status[]">
                        <option value="1">Active</option>
                          <option value="0" >Disable</option>
                        </select>
                      </div> 
                      </div>

`;
$(document).ready(function(){
  $('#addSoftware').click(function(e){
    var d = new Date();
    var n = d.getTime();
    $('.softwares_add').append('<div class="'+n+'">'+text+'<div>');
    $("."+n+" input[type='number']").inputSpinner();
    e.preventDefault();
  });
  $('.softwares_add').on('click','.deleteSoftware',function(e){
    $($(e.target).parent()).parent().remove();
    e.preventDefault();

  });
});
</script>
@endsection


@extends('layouts.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Licenses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Licenses</li>
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
                <h3 class="card-title">Edit License</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('license.edit',$license->id)}}">
                  @csrf
                <div class="card-body">
                    <div class="form-group">
                    <label for="license_key">License Key</label>
                      <div class="input-group">
                    <input type="text" class="form-control" value="{{$license->license_key}}"  name="license_key" id="license_key" placeholder="License Key">
                    <span class="input-group-btn">
    <button class="btn btn-default" type="button" id="gb-key">Generate Key</button>
  </span>
                  </div>

                  </div>


                    <div class="form-group">
                    <label for="domain">Domain</label>
                    <input type="text" class="form-control" value="{{$license->domain}}"  name="domain" id="domain" placeholder="Domain">
                  </div>
                    <div class="form-group">
                    <label for="name">Ip</label>
                    <input type="text" class="form-control" value="{{$license->ip}}" name="ip" id="ip" placeholder="Ip">
                  </div>
                  
                   <div class="form-group">
                    <label for="name">ValidDirs</label>
                    <textarea type="text" class="form-control"   name="Validdir" id="ip" placeholder="Valid Dirs">{{$license->validdirs}}</textarea>
                  </div>

                
                  <div class="form-group">
                    <label for="end_at">End At</label>
                    <input type="text" class="form-control datetime" value="{{$license->end_at}}" name="end_at" id="end_at" placeholder="End At">
                  </div>
                         <!-- Software select -->
                    <div class="form-group">
                        <label>Software</label>
                        <select class="form-control" name="software_id">
                          <option value="whmcs" >Whmcs</option>
                        </select>
                      </div> 
                                   <!-- select -->
                 <div class="form-group">
                        <label>Reseller</label>
                        <select class="form-control" name="reseller">
                        <option value="" {{ $license->reseller_id == '' ? 'selected' : ''}}>none</option>
                        @if($resellers)
                        @foreach($resellers as $reseller1)
                          <option value="{{$reseller1->id}}" {{ $license->reseller_id == $reseller1->id ? 'selected' : ''}}>{{$reseller1->name}}</option>
                        @endforeach
                        @endif
                        </select>
                      </div> 
                 <!-- select -->
                 <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1" {{ $license->status == 1 ? 'selected' : ''}} >Active</option>
                          <option value="0" {{ $license->status != 1 ? 'selected' : ''}}>Disable</option>
                        </select>
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

@section('endfooter')
<script>
function makeid(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}

function generate_key(){
    var old_license = $('#license_key').val().split('-')[0];
    var key = makeid(20);
    var new_license = old_license+"-"+key;
    $('#license_key').val(new_license.toLowerCase());
}
$(document).ready(function(){

$('#gb-key').click(function(){
generate_key();
});

});
</script>
@endsection
@endsection

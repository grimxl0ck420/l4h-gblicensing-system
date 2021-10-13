

@extends('layouts.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Softwares</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Softwares</li>
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
                <h3 class="card-title">Edit Software</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('software.edit',$software->id)}}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{$software->name}}" name="name" id="name" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="price_reseller">Reseller price</label>
                    <input type="number" class="form-control" value="{{$software->price_reseller}}"  name="price_reseller" id="price_reseller" placeholder="Reseller price">
                  </div>
                  <div class="form-group">
                    <label for="key">Key</label>
                    <input type="text" class="form-control" value="{{$software->key}}" name="key" id="key" placeholder="Key">
                  </div>
                  <div class="form-group">
                    <label for="cmd">Command lines</label>
                    <textarea  class="form-control" rows="3" name="cmd" id="cmd" placeholder="Command lines">{{$software->cmd}}</textarea>
                    <p>{domain} = $domain</o>
                    <p>{folder} = $folder</p>

                </div>
                       <!-- /.col -->
              <div class="col-12">
                <div class="form-group">
                  <label>Assign with</label>
                  <div class="select2-purple">
                    <select class="select2" multiple="multiple" autocomplete="off" data-placeholder="Select a Softwares" name="softwares[]" data-dropdown-css-class="select2-purple" style="width: 100%;">
                     @if($softwares1)
                     @php
                     $old_software = json_decode($software->softwares,true);
                     @endphp
                     @foreach($softwares1 as $software1)
                     
                     @if($software->id != $software1->id)
                     @if(is_array($old_software) && count($old_software) > 0 )
                        <option value="{{$software1->id}}" {{ in_array($software1->id,$old_software) ? 'selected' : ''}}>{{$software1->name}}</option>
                      @else
                        <option value="{{$software1->id}}" >{{$software1->name}}</option>
                      @endif
                      @endif

                      @endforeach
                    @endif
                    </select>
                  </div>
                </div>
                                 <!-- Change ip -->
                 <div class="form-group">
                        <label>Change Ip </label>
                        <select class="form-control" name="change_ip">
                          <option value="1" {{ $software->change_ip == 1 ? 'selected' : ''}} >Active</option>
                          <option value="0" {{ $software->change_ip != 1 ? 'selected' : ''}}>Disable</option>
                        </select>
                      </div> 

                 <!-- select -->
                 <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1" {{ $software->status == 1 ? 'selected' : ''}} >Active</option>
                          <option value="0" {{ $software->status != 1 ? 'selected' : ''}}>Disable</option>
                        </select>
                      </div> 
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



@extends('layouts.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Servers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Servers</li>
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
                <h3 class="card-title">Add Server</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('server.add')}}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{old('name')}}"  name="name" id="name" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="key">proxy_conf</label>
                    <textarea  class="form-control" rows="3" name="proxy_conf" id="proxy_conf" placeholder="Proxy configuration">{{old('proxy_conf')}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="key">Key</label>
                    <textarea  class="form-control" rows="3" name="key" id="key" placeholder="Key">{{old('key')}}</textarea>
                  </div>
					 <div class="form-group">
                    <label for="priority">Priority</label>
                    <input type="number" class="form-control" value="{{old('priority')}}"  name="priority" id="priority" placeholder="Priority">
                  </div>
                  	 <div class="form-group">
                    <label for="expiry_date">Expiry date</label>
                    <input type="number" class="form-control" value="{{old('expiry_date')}}"  name="expiry_date" id="expiry_date" placeholder="Expiry date">
                  </div>
                  <div class="form-group">
                    <label for="limit">Limit </label>
                    <input type="number" class="form-control"  value="0"  name="limit" id="limit" placeholder="Limit">
                  </div>
                    <!-- Software select -->
                 <div class="form-group">
                        <label>Software</label>
                        <select class="form-control" name="software_id">
                          @if($softwares)
                          @foreach($softwares as $software)
                          <option value="{{$software->id}}" {{ old('status') == $software->id ? 'selected' : ''}}>{{$software->name}}</option>
                          @endforeach
                          @endif
                        </select>
                      </div> 

                 <!-- select -->
                 <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                        <option value="1" {{ old('status') == 1 ? 'selected' : ''}}>Active</option>
                          <option value="0" >Disable</option>
                        </select>
                      </div> 
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Submit</button>
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

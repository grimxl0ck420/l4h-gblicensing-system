

@extends('layouts.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Virtual Server</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Virtual Server</li>
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
                <h3 class="card-title">Edit Virtual Server</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('virtualserver.edit',$virtualserver->id)}}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control"  value="{{$virtualserver->title}}" name="title" id="title" placeholder="title">
                  </div> 
                
                  <div class="form-group">
                    <label for="server_ip">Server Ip</label>
                    <input type="text" class="form-control"  value="{{$virtualserver->server_ip}}" name="server_ip" id="server_ip" placeholder="Server Ip">
                  </div> 
              
                  <div class="form-group">
                    <label for="server_key">Key</label>
                    <input type="text" class="form-control"  value="{{$virtualserver->server_key}}" name="server_key" id="server_key" placeholder="Key">
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


@endsection

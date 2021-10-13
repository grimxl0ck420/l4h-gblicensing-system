
@extends('layouts.layout')

@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Api Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Api</li>
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
                <h3 class="card-title">Edit Api</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('api.update')}}">
                  @csrf

                <div class="card-body">
       
                <div class="form-group">
                    <label for="api_key">Api Key</label>
                    <input type="text" class="form-control" readonly name="api_key" value="{{$api_key->value}}" id="api_key" placeholder="Api Key">
                  </div>
                  <div class="form-group">
                    <label for="enable_api">Enable Api </label>

                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="enable_api" name="enable_api" value="1" @if($enable_api->value == '1') checked @endif>
                        <label for="enable_api">
                        </label>
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
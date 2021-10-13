

@extends('layouts.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
                <h3 class="card-title">Edit Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('profile')}}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" value="{{\Auth::user()->username}}" disabled id="name" placeholder="Brand">
                  </div>
                
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control"  value="" name="password" id="password" placeholder="Password">
                  </div>

                  <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control"  value="" name="cpassword" id="cpassword" placeholder="Confirm Password">
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

@endsection

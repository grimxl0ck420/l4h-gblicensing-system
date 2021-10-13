

@extends('layouts.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Reseller Levels</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Reseller Levels</li>
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
                <h3 class="card-title">Add Reseller Level</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('level.add')}}" autocomplete="off">
                  @csrf
                  <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" value="{{old('title')}}"  autocomplete="off" name="title" id="title" placeholder="Title">
                  </div>
                   @foreach($softwares as $key => $software)
                   <input type="hidden" name="softwares[]" value="{{$software->id}}">
                  <div class="form-group">
                    <label for="price_reseller[{{$software->id}}]">{{$software->name}} price</label>
                    <input type="number" step="0.1" data-decimals="1" class="form-control" value="{{old("price_reseller")[$key]}}" autocomplete="off"  name="price_reseller[]" id="price_reseller[{{$software->id}}]" placeholder="{{$software->name}} price">
                  </div>
                  @endforeach
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

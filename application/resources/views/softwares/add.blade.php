

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
                <h3 class="card-title">Add Software</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('software.add')}}" autocomplete="off">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{old('name')}}"  autocomplete="off" name="name" id="name" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="price_reseller">Reseller price</label>
                    <input type="number" class="form-control" value="{{old('price_reseller')}}" autocomplete="off"  name="price_reseller" id="price_reseller" placeholder="Reseller price">
                  </div>
                  <div class="form-group">
                    <label for="key">Key</label>
                    <input type="text" class="form-control" value="{{old('key')}}" autocomplete="off" name="key" id="key" placeholder="Key">
                  </div>
                  <div class="form-group">
                    <label for="cmd">Command lines</label>
                    <textarea  class="form-control" rows="3" name="cmd" id="cmd" autocomplete="off" placeholder="Command lines"></textarea>
                    <p>{domain} = $domain</o>
                    <p>{folder} = $folder</p>
                  </div>
                     <!-- /.col -->
              <div class="col-12">
                <div class="form-group">
                  <label>Assign with</label>
                  <div class="select2-purple">
                    <select class="select2" multiple="multiple" autocomplete="off" data-placeholder="Select a Softwares" name="softwares[]" data-dropdown-css-class="select2-purple" style="width: 100%;">
                     @if($softwares)
                     @foreach($softwares as $software)
                        <option value="{{$software->id}}">{{$software->name}}</option>
                      @endforeach
                    @endif
                    </select>
                  </div>
                </div>
                <!-- /.form-group -->
                 <!-- change ip -->
                    <div class="form-group">
                        <label>Change Ip</label>
                        <select class="form-control" autocomplete="off" name="change_ip">
                        <option value="1" {{ old('change_ip') == 1 ? 'selected' : ''}}>Active</option>
                          <option value="0" >Disable</option>
                        </select>
                      </div> 

                 <!-- select -->
                 <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" autocomplete="off" name="status">
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

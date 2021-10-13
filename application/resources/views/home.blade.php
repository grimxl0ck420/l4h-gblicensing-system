@extends('layouts.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{\App\Server::all()->count()}}</h3>

                <p>Servers</p>
              </div>
              <div class="icon">
                <i class="fa fa-server"></i>
              </div>
              <a href="{{route('servers')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{\App\Proxy::all()->count()}}</h3>

                <p>Proxies</p>
              </div>
              <div class="icon">
                <i class="fa fa-desktop"></i>
              </div>
              <a href="{{route('proxies')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-default">
              <div class="inner">
                <h3>{{\App\ProxySoftware::all()->count()}}</h3>
                <p>Proxy Softwares</p>
              </div>
              <div class="icon">
                <i class="fa fa-database"></i>
              </div>
              <a href="{{route('proxies')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{\App\Software::all()->count()}}</h3>

                <p>Softwares</p>
              </div>
              <div class="icon">
                <i class="fas fa-mobile"></i>
              </div>
              <a href="{{route('softwares')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{\App\License::all()->count()}}</h3>

                <p>Licenses</p>
              </div>
              <div class="icon">
                <i class="fas fa-ticket-alt"></i>
              </div>
              <a href="{{route('licenses')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

         <!-- ./col -->
         <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{\App\Reseller::all()->count()}}</h3>

                <p>Resellers</p>
              </div>
              <div class="icon">
                <i class="fas fa-ticket-alt"></i>
              </div>
              <a href="{{route('resellers')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
     

        <div class="col-md-12">
            <div class="card">

                <div class="card-body">

                    <h1>{{ $chart1->options['chart_title'] }}</h1>
                    {!! $chart1->renderHtml() !!}

                </div>

            </div>


            </div>

            

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@section('endfooter')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}

@endsection

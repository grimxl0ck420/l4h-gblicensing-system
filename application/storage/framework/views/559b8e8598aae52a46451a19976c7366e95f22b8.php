<?php $__env->startSection('content'); ?>

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
              <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
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
                <h3><?php echo e(\App\Server::all()->count()); ?></h3>

                <p>Servers</p>
              </div>
              <div class="icon">
                <i class="fa fa-server"></i>
              </div>
              <a href="<?php echo e(route('servers')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo e(\App\Proxy::all()->count()); ?></h3>

                <p>Proxies</p>
              </div>
              <div class="icon">
                <i class="fa fa-desktop"></i>
              </div>
              <a href="<?php echo e(route('proxies')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-default">
              <div class="inner">
                <h3><?php echo e(\App\ProxySoftware::all()->count()); ?></h3>
                <p>Proxy Softwares</p>
              </div>
              <div class="icon">
                <i class="fa fa-database"></i>
              </div>
              <a href="<?php echo e(route('proxies')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo e(\App\Software::all()->count()); ?></h3>

                <p>Softwares</p>
              </div>
              <div class="icon">
                <i class="fas fa-mobile"></i>
              </div>
              <a href="<?php echo e(route('softwares')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo e(\App\License::all()->count()); ?></h3>

                <p>Licenses</p>
              </div>
              <div class="icon">
                <i class="fas fa-ticket-alt"></i>
              </div>
              <a href="<?php echo e(route('licenses')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

         <!-- ./col -->
         <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo e(\App\Reseller::all()->count()); ?></h3>

                <p>Resellers</p>
              </div>
              <div class="icon">
                <i class="fas fa-ticket-alt"></i>
              </div>
              <a href="<?php echo e(route('resellers')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
      

        <div class="col-md-12">
            <div class="card">

                <div class="card-body">

                    <h1><?php echo e($chart1->options['chart_title']); ?></h1>
                    <?php echo $chart1->renderHtml(); ?>


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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('endfooter'); ?>
<?php echo $chart1->renderChartJsLibrary(); ?>

<?php echo $chart1->renderJs(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/license4/subdomains/api.license4.host/application/resources/views/home.blade.php ENDPATH**/ ?>




<?php $__env->startSection('content'); ?>

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
              <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
              <li class="breadcrumb-item active">Reseller Levels</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
    <?php echo $__env->make('notify.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('notify.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit <?php echo e($level->title); ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="<?php echo e(route('level.edit',$level->id)); ?>">
                  <?php echo csrf_field(); ?>
              
                  <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" value="<?php echo e($level->title); ?>"  autocomplete="off" name="title" id="title" placeholder="Title">
                  </div>
                  <?php $__currentLoopData = $softwares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $software): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <input type="hidden" name="softwares[]" value="<?php echo e($software->id); ?>">
                  <div class="form-group">
                    <label for="price_reseller[<?php echo e($software->id); ?>]"><?php echo e($software->name); ?> price</label>
                    <?php if(\App\LevelResellerOption::where('software_id',$software->id)->where('level_reseller_id',$level->id)->count() > 0 ): ?>
                      <?php
                      $price =\App\LevelResellerOption::where('software_id',$software->id)->where('level_reseller_id',$level->id)->first()->price_reseller;
                      ?>
                    <?php else: ?>
                      <?php
                      $price = 0 ;
                      ?>
 
                    <?php endif; ?>
                    <input type="number" step="0.1" data-decimals="1" class="form-control" value="<?php echo e($price); ?>" autocomplete="off"  name="price_reseller[]" id="price_reseller[<?php echo e($software->id); ?>]" placeholder="<?php echo e($software->name); ?> price">
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/license4.host/api.license4.host/application/resources/views/levels/edit.blade.php ENDPATH**/ ?>
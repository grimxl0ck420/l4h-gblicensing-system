



<?php $__env->startSection('content'); ?>

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
              <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
              <li class="breadcrumb-item active">Softwares</li>
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
                <h3 class="card-title">Edit Software</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="<?php echo e(route('software.edit',$software->id)); ?>">
                  <?php echo csrf_field(); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="<?php echo e($software->name); ?>" name="name" id="name" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="price_reseller">Reseller price</label>
                    <input type="number" class="form-control" value="<?php echo e($software->price_reseller); ?>"  name="price_reseller" id="price_reseller" placeholder="Reseller price">
                  </div>
                  <div class="form-group">
                    <label for="key">Key</label>
                    <input type="text" class="form-control" value="<?php echo e($software->key); ?>" name="key" id="key" placeholder="Key">
                  </div>
                  <div class="form-group">
                    <label for="cmd">Command lines</label>
                    <textarea  class="form-control" rows="3" name="cmd" id="cmd" placeholder="Command lines"><?php echo e($software->cmd); ?></textarea>
                    <p>{domain} = $domain</o>
                    <p>{folder} = $folder</p>

                </div>
                       <!-- /.col -->
              <div class="col-12">
                <div class="form-group">
                  <label>Assign with</label>
                  <div class="select2-purple">
                    <select class="select2" multiple="multiple" autocomplete="off" data-placeholder="Select a Softwares" name="softwares[]" data-dropdown-css-class="select2-purple" style="width: 100%;">
                     <?php if($softwares1): ?>
                     <?php
                     $old_software = json_decode($software->softwares,true);
                     ?>
                     <?php $__currentLoopData = $softwares1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $software1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     
                     <?php if($software->id != $software1->id): ?>
                     <?php if(is_array($old_software) && count($old_software) > 0 ): ?>
                        <option value="<?php echo e($software1->id); ?>" <?php echo e(in_array($software1->id,$old_software) ? 'selected' : ''); ?>><?php echo e($software1->name); ?></option>
                      <?php else: ?>
                        <option value="<?php echo e($software1->id); ?>" ><?php echo e($software1->name); ?></option>
                      <?php endif; ?>
                      <?php endif; ?>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </select>
                  </div>
                </div>
                                 <!-- Change ip -->
                 <div class="form-group">
                        <label>Change Ip </label>
                        <select class="form-control" name="change_ip">
                          <option value="1" <?php echo e($software->change_ip == 1 ? 'selected' : ''); ?> >Active</option>
                          <option value="0" <?php echo e($software->change_ip != 1 ? 'selected' : ''); ?>>Disable</option>
                        </select>
                      </div> 

                 <!-- select -->
                 <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1" <?php echo e($software->status == 1 ? 'selected' : ''); ?> >Active</option>
                          <option value="0" <?php echo e($software->status != 1 ? 'selected' : ''); ?>>Disable</option>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cyberlicense/api.cyberlicense.net/application/resources/views/softwares/edit.blade.php ENDPATH**/ ?>




<?php $__env->startSection('content'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Proxies</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
              <li class="breadcrumb-item active">Proxies</li>
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
                <h3 class="card-title">Edit Proxy</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="<?php echo e(route('proxy.edit',$proxy->id)); ?>">
                  <?php echo csrf_field(); ?>
                <div class="card-body">
					<div class="form-group">
                    <label for="backend_ip">Backend Ip</label>
                    <input type="text" class="form-control" value="<?php echo e($proxy->backend_ip); ?>" name="backend_ip" id="backend_ip" placeholder="Backend Ip">
                  </div>
					<div class="form-group">
                    <label for="backend_port">Backend Port</label>
                    <input type="text" class="form-control" value="<?php echo e($proxy->backend_port); ?>" name="backend_port" id="backend_port" placeholder="Backend Port">
                  </div>
                    <!-- type select -->
                  <div class="form-group">
                        <label>Backend Type</label>
                        <select class="form-control" name="backend_type">
                        <?php
                        $type = ['socks4','socks5','http','https'];
                        ?>
                          <?php if($type): ?>
                          <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($type_one); ?>" <?php echo e($type_one == $proxy->backend_type ? 'selected' : ''); ?>><?php echo e($type_one); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                  </select>
                      </div> 
                <div class="form-group">
                    <label for="ip">Ip</label>
                    <input type="text" class="form-control" value="<?php echo e($proxy->ip); ?>" name="ip" id="ip" placeholder="Ip">
                  </div>
                   <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" value="<?php echo e($proxy->username); ?>" name="username" id="username" placeholder="Username">
                  </div>
                   <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" value="<?php echo e($proxy->password); ?>" name="password" id="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="port">Port</label>
                    <input type="text" class="form-control" value="<?php echo e($proxy->port); ?>" name="port" id="port" placeholder="Port">
                  </div>
                    <!-- type select -->
                  <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="type">
                        <?php
                        $type = ['socks4','socks5','http','https'];
                        ?>
                          <?php if($type): ?>
                          <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($type_one); ?>" <?php echo e($type_one == $proxy->type ? 'selected' : ''); ?>><?php echo e($type_one); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                  </select>
                      </div> 
                      <div class="form-group">
                    <label for="expiry_date">Expiry date</label>
                    <input type="number" class="form-control" value="<?php echo e($proxy->expiry_date); ?>"  name="expiry_date_proxy" id="expiry_date" placeholder="Expiry date">
                  </div>
                 <!-- select -->
                 <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status_proxy">
                          <option value="1" <?php echo e($proxy->status == 1 ? 'selected' : ''); ?> >Active</option>
                          <option value="0" <?php echo e($proxy->status != 1 ? 'selected' : ''); ?>>Disable</option>
                        </select>
                      </div> 
                      <div class="softwares_add">
                      <?php if($proxySoftware): ?>
                      <?php $__currentLoopData = $proxySoftware; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proxy_software): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="software" style="padding-top:15px;">
                      <hr>
                      <div class="text-right" style="padding-top:15px;">
                  <a  class="btn btn-danger deleteSoftware"  href="javascript:void(0)">Delete</a>
                </div>
                
                    <input type="hidden" class="form-control"  value="<?php echo e($proxy_software->id); ?>"  name="software_proxy_id[]" >

                           <!-- Software select -->
                         <div class="form-group">
                        <label>Software</label>
                        <select class="form-control" name="software_id_old[]">
                          <?php if($softwares): ?>
                          <?php $__currentLoopData = $softwares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $software): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($software->id); ?>" <?php echo e($proxy_software->software_id == $software->id ? 'selected' : ''); ?>><?php echo e($software->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </select>
                      </div> 
                      <div class="form-group">
                    <label for="key">Key</label>
                    <textarea  class="form-control" rows="3" name="key_old[]"  id="key" placeholder="Key"><?php echo e($proxy_software->key); ?></textarea>
                  </div>
                      <div class="form-group">
                    <label >Expiry date</label>
                    <input type="number" class="form-control" value="<?php echo e($proxy_software->expiry_date); ?>" name="expiry_date_old[]" id="expiry_date" placeholder="Expiry date">
                  </div>
                  <div class="form-group">
                    <label >Priority</label>
                    <input type="number" class="form-control" value="<?php echo e($proxy_software->priority); ?>"  name="priority_old[]" id="priority" placeholder="Priority">
                  </div>
                  <div class="form-group">
                    <label >Limit </label>
                    <input type="number" class="form-control"  value="<?php echo e($proxy_software->use); ?>"  name="limit_old[]" id="limit" placeholder="Limit">
                  </div>
                  <!-- select -->
                 <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status_old[]">
                        <option value="1" <?php echo e($proxy_software->status == 1 ? 'selected' : ''); ?> >Active</option>
                          <option value="0" <?php echo e($proxy_software->status != 1 ? 'selected' : ''); ?>>Disable</option>
                        </select>
                      </div> 
                      </div>
                    <p>
                    Used : <?php echo e($proxy_software->used); ?>

                    </p>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                  </div>
                      <!-- /.card-body -->
                <div class=" text-left" style="padding-top:15px;">
                  <a href="javascript:void(0)" class="btn btn-secondary" id="addSoftware">Add Software</a>
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
<?php $__env->startSection('endfooter'); ?>
<script>
var text = `
<div class="software" style="padding-top:15px;">
                      <hr>
                      <div class="text-right" style="padding-top:15px;">
                  <a  class="btn btn-danger deleteSoftware"  href="javascript:void(0)">Delete</a>
                </div>
                           <!-- Software select -->
                         <div class="form-group">
                        <label>Software</label>
                        <select class="form-control" name="software_id[]">
                          <?php if($softwares): ?>
                          <?php $__currentLoopData = $softwares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $software): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($software->id); ?>"><?php echo e($software->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </select>
                      </div> 
                      <div class="form-group">
                    <label for="key">Key</label>
                    <textarea  class="form-control" rows="3" name="key[]" id="key" placeholder="Key"></textarea>
                  </div>
                      <div class="form-group">
                    <label >Expiry date</label>
                    <input type="number" class="form-control" value="0" name="expiry_date[]" id="expiry_date" placeholder="Expiry date">
                  </div>
                  <div class="form-group">
                    <label >Priority</label>
                    <input type="number" class="form-control" value="1"  name="priority[]" id="priority" placeholder="Priority">
                  </div>
                  <div class="form-group">
                    <label >Limit </label>
                    <input type="number" class="form-control"  value="0"  name="limit[]" id="limit" placeholder="Limit">
                  </div>
                  <!-- select -->
                 <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status[]">
                        <option value="1">Active</option>
                          <option value="0" >Disable</option>
                        </select>
                      </div> 
                      </div>

`;
$(document).ready(function(){
  $('#addSoftware').click(function(e){
    var d = new Date();
    var n = d.getTime();
    $('.softwares_add').append('<div class="'+n+'">'+text+'<div>');
    $("."+n+" input[type='number']").inputSpinner();
    e.preventDefault();
  });
  $('.softwares_add').on('click','.deleteSoftware',function(e){
    $($(e.target).parent()).parent().remove();
    e.preventDefault();

  });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cyberlicense/api.cyberlicense.net/application/resources/views/proxies/edit.blade.php ENDPATH**/ ?>
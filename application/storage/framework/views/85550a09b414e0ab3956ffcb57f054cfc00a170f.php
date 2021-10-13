


<?php $__env->startSection('content'); ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
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
                <h3 class="card-title">Edit Settings</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="<?php echo e(route('setting.update')); ?>">
                  <?php echo csrf_field(); ?>
                <div class="card-body">
                <div class="form-group">
                    <label for="site_name">Site name</label>
                    <input type="text" class="form-control" name="site_name" value="<?php echo e($site_name->value); ?>" id="site_name" placeholder="Site Name">
                  </div>
                  <div class="form-group">
                    <label for="whmcs_domain">Whmcs domain</label>
                    <input type="text" class="form-control" name="whmcs_domain" value="<?php echo e($whmcs_domain->value); ?>" id="whmcs_domain" placeholder="Whmcs Domain">
                  </div>
                  <div class="form-group">
                    <label for="whmcs_username">Whmcs username</label>
                    <input type="text" class="form-control" name="whmcs_username" value="<?php echo e($whmcs_username->value); ?>" id="whmcs_username" placeholder="Whmcs Username">
                  </div>
                  <div class="form-group">
                    <label for="whmcs_password">Whmcs password</label>
                    <input type="password" class="form-control" name="whmcs_password" value="<?php echo e($whmcs_password->value); ?>" id="whmcs_password" placeholder="Whmcs Password">
                  </div>
                  <div class="form-group mt-5">
                    <label for="proxy_using">Prevent web proxy</label>

                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="proxy_using" name="proxy_using"  value="1" <?php if($proxy_using->value == '1'): ?> checked <?php endif; ?>>
                        <label for="proxy_using">
                        </label>
                      </div>
                  </div>
                  <!--
                  <div class="form-group">
                    <label for="client_login">Disable client area </label>

                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="client_login" name="client_login" value="1" <?php if($client_login->value == '1'): ?> checked <?php endif; ?>>
                        <label for="client_login">
                        </label>
                      </div>
                  </div>
                  -->
                  <div class="form-group">
                    <label for="IP_whitelist">Enable IP whitelist </label>

                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="IP_whitelist" name="IP_whitelist" value="1" <?php if($IP_whitelist->value == '1'): ?> checked <?php endif; ?>>
                        <label for="IP_whitelist">
                        </label>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="last_using">Rearrange proxies</label>

                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="last_using" name="last_using" value="1" <?php if($last_using->value == '1'): ?> checked <?php endif; ?>>
                        <label for="last_using">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/license4.host/api.license4.host/application/resources/views/settings.blade.php ENDPATH**/ ?>




<?php $__env->startSection('content'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Resellers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
              <li class="breadcrumb-item active">Resellers</li>
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
                <h3 class="card-title">Edit Reseller</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="<?php echo e(route('reseller.edit',$reseller->id)); ?>">
                  <?php echo csrf_field(); ?>
                <div class="card-body">
                <div class="form-group">
                    <label for="token">Token</label>
                    <input type="text" class="form-control" readonly value="<?php echo e($reseller->token); ?>" name="token" id="token" placeholder="Token">
                  </div>
                  <div class="form-group">
                    <label for="name">Brand</label>
                    <input type="text" class="form-control" value="<?php echo e($reseller->name); ?>" name="name" id="name" placeholder="Brand">
                  </div>
                    <div class="form-group">
                    <label for="main_domain">Main Domain</label>
                    <input type="text" class="form-control" value="<?php echo e($reseller->main_domain); ?>" name="main_domain" id="main_domain" placeholder="Main Domain">
                  </div>
                  <div class="form-group">
                    <label for="domain">Domain</label>
                    <input type="text" class="form-control" value="<?php echo e($reseller->domain); ?>" name="domain" id="domain" placeholder="Domain">
                  </div>
                    <div class="form-group">
                    <label for="folder">Folder</label>
                    <input type="text" class="form-control" value="<?php echo e($reseller->folder); ?>" name="folder" id="folder" placeholder="Folder">
                  </div>
                   <div style="display:none;" class="form-group">
                    <label for="key_cmd">Key cmd</label>
                    <input type="text" class="form-control" value="gb"  name="key_cmd" id="key_cmd" placeholder="Key cmd">
                  </div>
                  <div class="form-group"  id="balance" <?php if($reseller->type == 'whmcs'): ?> style="display:none" <?php endif; ?>>
                    <label for="balance" >Balance</label>
                    <input type="number" step="0.1" data-decimals="1" class="form-control" value="<?php echo e($reseller->balance); ?>"  name="balance" id="balance" placeholder="Balance">
                  </div>

                  <div class="form-group">
                    <label for="end_at">End At</label>
                    <input type="text" class="form-control datetime" value="<?php echo e($reseller->end_at); ?>" name="end_at" id="end_at" placeholder="End At">
                  </div>
                 <div class="form-group">
                        <label>Type</label>
                        <select id="type" class="form-control" name="type">
                        <option value="local"  <?php echo e($reseller->type == 'local' ? 'selected' : ''); ?>>Local</option>
                        <option value="whmcs" <?php echo e($reseller->type == 'whmcs' ? 'selected' : ''); ?>>Whmcs</option>
                        </select>
                    </div> 
                 <!-- select -->
                 <div class="form-group">
                        <label>Reseller Level</label>
                        <select class="form-control" name="level">
                          <option value="" >None</option>
                          <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($level->id); ?>" <?php if($reseller->level_id == $level->id): ?> selected <?php endif; ?> ><?php echo e($level->title); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div> 
   <!-- select -->
                      <div class="form-group client_view" <?php if($reseller->type != 'whmcs'): ?> style="display:none" <?php endif; ?>>
                        <label>Clients</label>
                        <select class="form-control" style="width: 100%" id="getClients" name="client_id">
                        <?php if($reseller->client_id && $reseller->type == 'whmcs'): ?>
                          <?php
                          $client = whmcs_get_client($reseller->client_id);
                          ?>
                          <?php if($client): ?>
                              <option value="<?php echo e($client['id']); ?>"><?php echo e($client['email']); ?></option>
                          <?php endif; ?>
                          <?php else: ?>
                          $client = '';
                        <?php endif; ?>
                        </select>
                      </div> 
               
                 <!-- select -->
                 <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1" <?php echo e($reseller->status == 1 ? 'selected' : ''); ?> >Active</option>
                          <option value="0" <?php echo e($reseller->status != 1 ? 'selected' : ''); ?>>Disable</option>
                        </select>
                      </div> 
                      <?php if($reseller->client_id && $reseller->type == 'whmcs'): ?>

                  <?php if($client): ?>

                  <p>
                  Balance : <?php echo e(intval($client['credit'])); ?> 
                  </p>
                  <?php endif; ?>
                  <?php endif; ?>

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


<?php $__env->stopSection(); ?>

<?php $__env->startSection('endfooter'); ?>
<script>
$(document).ready(function(){
  $('#type').change(function(e){
    if($(e.target).val() == 'whmcs'){
      $('.client_view').show();
      $('#balance').hide();

    }else{
      $('.client_view').hide();
      $('#balance').show();

    }
  });
  $( "#getClients" ).select2({
    minimumInputLength: 3,
  ajax: {
    url: "<?php echo e(route('getClients')); ?>",
    dataType: 'json',
    type: 'GET',
      data: function (params) {

                    return {
                      term: params.term, // search term
                    };
                },
    processResults: function (data) {
                    var arr = []
                    $.each(data, function (index, value) {
                        arr.push({
                            id: value.id,
                            text: value.email
                        })
                    })
                    return {
                        results: arr
                    };
                },

}
});

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/license4/subdomains/api.license4.host/application/resources/views/resellers/edit.blade.php ENDPATH**/ ?>
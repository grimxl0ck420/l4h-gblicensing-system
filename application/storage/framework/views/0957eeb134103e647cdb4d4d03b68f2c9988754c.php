



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
                <h3 class="card-title">Add Reseller</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="<?php echo e(route('reseller.add')); ?>">
                  <?php echo csrf_field(); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Brand</label>
                    <input type="text" class="form-control" value="<?php echo e(old('name')); ?>" name="name" id="name" placeholder="Brand">
                  </div>
                     <div class="form-group">
                    <label for="main_domain">Main Domain</label>
                    <input type="text" class="form-control" value="<?php echo e(old('main_domain')); ?>"  name="main_domain" id="main_domain" placeholder="Main Domain">
                  </div>
                  <div class="form-group">
                    <label for="domain">Domain</label>
                    <input type="text" class="form-control" value="<?php echo e(old('domain')); ?>"  name="domain" id="domain" placeholder="Domain">
                  </div>
                 
                         <div class="form-group">
                    <label for="folder">Folder</label>
                    <input type="text" class="form-control" value="<?php echo e(old('folder')); ?>"  name="folder" id="folder" placeholder="Folder">
                  </div>
                    <div class="form-group" style="display:none">
                    <label for="key_cmd">key cmd</label>
                    <input type="text" class="form-control" value="gb"  name="key_cmd" id="key_cmd" placeholder="key cmd">
                  </div>
                  
                  <div class="form-group" id="balance">
                    <label for="balance">Balance</label>
                    <input type="number" step="0.1" data-decimals="1" class="form-control"  value="<?php echo e(old('balance')); ?>" name="balance" id="balance" placeholder="Balance">
                  </div>

                  <div class="form-group">
                    <label for="end_at">End At</label>
                    <input type="text" class="form-control datetime" value="<?php echo e(old('end_at')); ?>"  name="end_at" id="end_at" placeholder="End At">
                  </div>
                  <!-- select -->
                  <div class="form-group">
                        <label>Reseller Level</label>
                        <select class="form-control" name="level">
                          <option value="" >None</option>
                          <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($level->id); ?>" ><?php echo e($level->title); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div> 
                                <!-- select -->
                 <div class="form-group">
                        <label>Type</label>
                        <select id="type" class="form-control" name="type">
                        <option value="local"  >Local</option>
                        <option value="whmcs" >Whmcs</option>
                        </select>
                      </div> 
                  <!-- select -->
                  <div class="form-group client_view" style="display:none">
                        <label>Clients</label>
                        <select class="form-control" style="width: 100%" id="getClients" name="client_id">
                        </select>
                      </div> 
               

                 <!-- select -->
                 <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                        <option value="1" <?php echo e(old('status') == 1 ? 'selected' : ''); ?>>Active</option>
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


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cyberlicense/api.cyberlicense.net/application/resources/views/resellers/add.blade.php ENDPATH**/ ?>
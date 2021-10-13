<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo session()->get('success'); ?>

    </div>
<?php endif; ?>
<?php /**PATH /home/licensems/api.license.ms/application/resources/views/notify/success.blade.php ENDPATH**/ ?>
<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo session()->get('success'); ?>

    </div>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/license4.host/api.license4.host/application/resources/views/notify/success.blade.php ENDPATH**/ ?>
<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo session()->get('success'); ?>

    </div>
<?php endif; ?>
<?php /**PATH /www/wwwroot/api5.bash.com.de/application/resources/views/notify/success.blade.php ENDPATH**/ ?>
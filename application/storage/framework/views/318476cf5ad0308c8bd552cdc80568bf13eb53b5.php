<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo session()->get('success'); ?>

    </div>
<?php endif; ?>
<?php /**PATH /home/license4/public_html/api/application/resources/views/notify/success.blade.php ENDPATH**/ ?>
<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo session()->get('success'); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\l4h\application\resources\views/notify/success.blade.php ENDPATH**/ ?>
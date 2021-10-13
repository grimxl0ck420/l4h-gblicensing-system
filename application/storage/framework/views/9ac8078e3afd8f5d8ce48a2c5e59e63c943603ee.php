<script>
    var ctx = document.getElementById("<?php echo e($options['chart_name'] ?? 'myChart'); ?>");
    var <?php echo e($options['chart_name'] ?? 'myChart'); ?> = new Chart(ctx, {
        type: '<?php echo e($options['chart_type'] ?? 'line'); ?>',
        data: {
            labels: [
                <?php $__currentLoopData = $datasets[0]['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    "<?php echo e($group); ?>",
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
        datasets: [
            <?php $__currentLoopData = $datasets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                label: '<?php echo e($dataset['name'] ?? $options['chart_name']); ?>',
                data: [
                    <?php $__currentLoopData = $dataset['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $result; ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                <?php if($options['chart_type'] == 'line'): ?>
                    fill: false,
                    <?php if(isset($dataset['color']) && $dataset['color'] != ''): ?>
                        borderColor: '<?php echo e($dataset['color']); ?>',
                    <?php else: ?>
                        borderColor: 'rgba(<?php echo e(rand(0,255)); ?>, <?php echo e(rand(0,255)); ?>, <?php echo e(rand(0,255)); ?>, 0.2)',
                    <?php endif; ?>
                <?php elseif($options['chart_type'] == 'pie'): ?>
                    backgroundColor: [
                        <?php $__currentLoopData = $dataset['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            'rgba(<?php echo e(rand(0,255)); ?>, <?php echo e(rand(0,255)); ?>, <?php echo e(rand(0,255)); ?>, 0.2)',
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                <?php endif; ?>
                borderWidth: 3
            },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]
    },
    options: {
        scales: {
            xAxes: [],
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
    });
</script>
<?php /**PATH /www/wwwroot/api5.bash.com.de/application/vendor/laraveldaily/laravel-charts/src/views/javascript.blade.php ENDPATH**/ ?>


<?php $__env->startSection('title'); ?>
Member
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<div class="container mt-4">
    <h1>Riwayat Transaksi</h1>
    <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3">
            <div class="card-header">
                <strong>Reservasi pada <?php echo e($reservation->created_at->format('d M Y')); ?></strong>
            </div>
            <div class="card-body">
                <p>Check-In: <?php echo e($reservation->check_in); ?></p>
                <p>Check-Out: <?php echo e($reservation->check_out); ?></p>
                <h5>Produk yang dipesan:</h5>
                <ul class="list-group">
                    <?php $__currentLoopData = $reservation->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <strong><?php echo e($product->name); ?></strong> di <?php echo e($product->hotel->name); ?> - Rp <?php echo e(number_format($product->price, 2)); ?>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\data\htdocs\wfp\laralux\resources\views/member/index.blade.php ENDPATH**/ ?>
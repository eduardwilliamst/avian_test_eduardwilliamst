

<?php $__env->startSection('title'); ?>
Reservasi
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Reservasi <?php echo e($product->name); ?></h2>
            <form action="<?php echo e(route('reservation.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                <div class="form-group">
                    <label for="check_in">Check-In Date</label>
                    <input type="date" name="check_in" class="form-control" id="check_in" required>
                </div>
                <div class="form-group">
                    <label for="check_out">Check-Out Date</label>
                    <input type="date" name="check_out" class="form-control" id="check_out" required>
                </div>
                <button type="submit" class="btn btn-primary">Reservasi</button>
                <a href="<?php echo e(route('catalog.index')); ?>" class="btn btn-secondary">Kembali ke Katalog</a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\data\htdocs\wfp\laralux\resources\views/reservation/create.blade.php ENDPATH**/ ?>


<?php $__env->startSection('title'); ?>
Tambah Hotel
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <h1>Tambah Hotel</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('hotels.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Nama Hotel</label>
            <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
        </div>
        <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" name="address" class="form-control" value="<?php echo e(old('address')); ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Telepon</label>
            <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone')); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
        </div>
        <div class="form-group">
            <label for="rating">Kelas/Rating</label>
            <input type="number" name="rating" class="form-control" value="<?php echo e(old('rating')); ?>" required min="1" max="5">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="<?php echo e(route('hotels.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\data\htdocs\wfp\laralux\resources\views/admin/hotels/create.blade.php ENDPATH**/ ?>
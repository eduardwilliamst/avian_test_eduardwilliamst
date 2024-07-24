

<?php $__env->startSection('title', 'Catalog'); ?>

<?php $__env->startSection('contents'); ?>
<div class="container mt-4 bg-light p-4 rounded">
    <div class="row">
        <div class="col-md-6">
            <?php if($product->hotel->image): ?>
                <img src="<?php echo e(asset('storage/' . $product->hotel->image)); ?>" class="img-fluid rounded mb-4" alt="<?php echo e($product->hotel->name); ?>">
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <h1 class="display-4"><?php echo e($product->name); ?></h1>
            <h3 class="text-muted"><?php echo e($product->hotel->name); ?></h3>
            <p class="lead">Rp <?php echo e(number_format($product->price, 2)); ?></p>
            <h4>Fasilitas</h4>
            <ul class="list-group mb-4">
                <?php $__currentLoopData = $product->facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <strong><?php echo e($facility->name); ?></strong>: <?php echo e($facility->description); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="mt-4">
                <a href="<?php echo e(route('catalog.index')); ?>" class="btn btn-secondary btn-lg mr-2">Kembali ke Katalog</a>
                <?php if(auth()->check() && (auth()->user()->hasRole('pembeli'))): ?>
                <form action="<?php echo e(route('reservation.create', $product->id)); ?>" method="GET">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-primary btn-lg">Reservasi</button>
                </form>
                <form action="<?php echo e(route('reservation.addToCart', $product->id)); ?>" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-cart-plus"></i> Add to Cart
                    </button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(auth()->check() && (auth()->user()->hasRole('owner') || auth()->user()->hasRole('staff')) ? 'layouts.adminlte' : 'layouts.pembeli', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\data\htdocs\wfp\laralux\resources\views/catalogs/show.blade.php ENDPATH**/ ?>
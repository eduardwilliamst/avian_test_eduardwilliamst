<?php if(auth()->check()): ?>

<?php endif; ?>

<?php $__env->startSection('title'); ?>
Laporan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<div class="container mt-5">
    <h1 class="catalog-heading">Laporan</h1>
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="top-products-tab" data-toggle="tab" href="#top-products" role="tab" aria-controls="top-products" aria-selected="true">Top Produk Hotel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="top-customers-tab" data-toggle="tab" href="#top-customers" role="tab" aria-controls="top-customers" aria-selected="false">Top Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="top-members-tab" data-toggle="tab" href="#top-members" role="tab" aria-controls="top-members" aria-selected="false">Top Poin Member</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="top-rating-tab" data-toggle="tab" href="#top-rating" role="tab" aria-controls="top-rating" aria-selected="false">Top Rating Hotel</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="top-products" role="tabpanel" aria-labelledby="top-products-tab">
                    <h3 class="mt-4">Top 3 Produk Hotel yang Paling Banyak Direservasi</h3>
                    <ul>
                        <?php $__currentLoopData = $topProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($product->name); ?> - <?php echo e($product->reservations_count); ?> reservasi</li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <div class="tab-pane fade" id="top-customers" role="tabpanel" aria-labelledby="top-customers-tab">
                    <h3 class="mt-4">Top 3 Pelanggan dengan Total Pembelian Terbanyak</h3>
                    <ul>
                        <?php $__currentLoopData = $topCustomers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($customer->name); ?> - Rp <?php echo e(number_format($customer->total_purchase, 2)); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <div class="tab-pane fade" id="top-members" role="tabpanel" aria-labelledby="top-members-tab">
                    <h3 class="mt-4">Top 3 Pelanggan dengan Poin Membership Terbanyak</h3>
                    <ul>
                        <?php $__currentLoopData = $topMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($member->name); ?> - <?php echo e($member->points); ?> poin</li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <div class="tab-pane fade" id="top-rating" role="tabpanel" aria-labelledby="top-rating-tab">
                    <h3 class="mt-4">Top Rating Hotel</h3>
                    <ul>
                        <?php $__currentLoopData = $topRating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ratings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($ratings->name); ?> - <?php echo e($ratings->rating); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .catalog-heading {
        font-size: 2.5rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 2rem;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(auth()->user()->hasRole('owner') || auth()->user()->hasRole('staff') ? 'layouts.adminlte' : 'layouts.pembeli', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\data\htdocs\wfp\laralux\resources\views/reports/index.blade.php ENDPATH**/ ?>
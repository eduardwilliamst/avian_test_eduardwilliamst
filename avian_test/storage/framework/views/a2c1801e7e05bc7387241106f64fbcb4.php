

<?php $__env->startSection('title', 'Catalog'); ?>

<?php $__env->startSection('contents'); ?>
<div class="container">
    <h1 class="catalog-heading">Katalog Produk</h1>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
            <div class="card product-card">
                <div class="card-img-container">
                    <?php if($product->hotel->image): ?>
                    <img src="<?php echo e(asset('storage/' . $product->hotel->image)); ?>" class="card-img-top" alt="<?php echo e($product->hotel->name); ?>">
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($product->name); ?></h5>
                    <p class="card-text"><?php echo e($product->hotel->name); ?></p>
                    <p class="card-text">Rp <?php echo e(number_format($product->price, 2)); ?></p>
                    <a href="<?php echo e(route('catalog.show', $product->id)); ?>" class="btn btn-primary detail-btn">Detail</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <?php echo e($products->links('vendor.pagination.adminlte')); ?>

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

    .product-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        margin-bottom: 2rem;
        /* Add some space between rows */
    }

    .card-img-container {
        width: 100%;
        height: 200px;
        overflow: hidden;
        background-color: #f8f9fa;
    }

    .product-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .card-title,
    .card-text {
        margin-bottom: 10px;
    }

    .detail-btn {
        margin-top: auto;
        /* Push the button to the bottom */
    }

    .row>[class*='col-'] {
        display: flex;
        flex-direction: column;
    }

    /* Pagination styles */
    .pagination {
        display: flex;
        justify-content: center;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
        padding: 2rem;
    }

    .pagination .page-item {
        margin: 0 0.25rem;
    }

    .pagination .page-item .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        text-decoration: none;
    }

    .pagination .page-item .page-link {
        color: #007bff !important;
        background-color: #fff !important;
        border: 1px solid #dee2e6 !important;
    }

    .pagination .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
    }

    .pagination .page-item .page-link:focus {
        box-shadow: none;
    }

    /* Specific styles to override any large arrow icons */
    .pagination .page-item .page-link svg {
        width: 1em;
        height: 1em;
    }

    .pagination .page-item .page-link svg path {
        fill: currentColor;
    }

    .pagination .page-item .page-link:before,
    .pagination .page-item .page-link:after {
        content: none !important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(auth()->check() && (auth()->user()->hasRole('owner') || auth()->user()->hasRole('staff')) ? 'layouts.adminlte' : 'layouts.pembeli', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\data\htdocs\wfp\laralux\resources\views/catalogs/index.blade.php ENDPATH**/ ?>
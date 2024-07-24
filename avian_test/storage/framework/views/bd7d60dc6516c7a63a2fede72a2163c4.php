

<?php $__env->startSection('title', 'Cart'); ?>

<?php $__env->startSection('contents'); ?>

<div class="container">
    <table id="cart" class="table table-hover table-condensed bg-light p-4 rounded">
        <thead>
            <tr>
                <th style="width: 40%;">Image</th>
                <th style="width: 10%;">Product</th>
                <th style="width: 20%;">Price</th>
                <th style="width: 20%;">Quantity</th>
                <th style="width: 50%;" class="text-center">Subtotal</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php $total = 0 ?>
            <?php if(session('cart')): ?>
            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $total += $details['price'] * $details['quantity'] ?>
            <tr>

                <td data-th="Image">
                <div class="col-sm-6 hidden-xs"><img src="<?php echo e(asset('storage/' . $details['image'])); ?>" alt="..." class="img-fluid rounded mb-4" /></div>
                </td>
                <td data-th="Product">
                <?php echo e($details['name']); ?>

                </td>
                <td data-th="Price">Rp <?php echo e(number_format($details['price'], 2)); ?></td>
                <td data-th="Quantity"><?php echo e($details['quantity']); ?></td>
                <td data-th="Subtotal" class="text-center">Rp <?php echo e(number_format($details['price'] * $details['quantity'], 2)); ?></td>
                <td class="actions" data-th="">
                    <!-- Remove button can be added here if needed -->
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td><a href="<?php echo e(route('catalog.index')); ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Booking</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs">
                    <form action="<?php echo e(route('checkout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger">Checkout <i class="fa fa-angle-right"></i></button>
                    </form>
                </td>
                <td class="hidden-xs text-center"><strong>Total: Rp <?php echo e(number_format($total, 2)); ?></strong></td>
            </tr>
        </tfoot>
    </table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(auth()->check() && (auth()->user()->hasRole('owner') || auth()->user()->hasRole('staff')) ? 'layouts.adminlte' : 'layouts.pembeli', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\data\htdocs\wfp\laralux\resources\views/cart/index.blade.php ENDPATH**/ ?>
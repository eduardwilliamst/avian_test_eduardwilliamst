

<?php $__env->startSection('title'); ?>
Product Types
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Product Types</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title">List of products Types</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addProductTypeModal">
                            <i class="fas fa-plus"></i> Add Product Type
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="producttypesTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $producttypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producttype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($producttype->id); ?></td>
                                <td><?php echo e($producttype->name); ?></td>
                                <td>
                                    <a href="<?php echo e(route('producttypes.edit', $producttype->id)); ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('producttypes.destroy', $producttype->id)); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Product Type -->
<div class="modal fade" id="addProductTypeModal" tabindex="-1" role="dialog" aria-labelledby="addProductTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductTypeModalLabel">Add Product Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('producttypes.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Product Type Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter product type name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
    $(document).ready(function() {
        $('#producttypesTable').DataTable();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\data\htdocs\wfp\laralux\resources\views/admin/producttypes/index.blade.php ENDPATH**/ ?>
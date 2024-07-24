

<?php $__env->startSection('title'); ?>
Hotel Types
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Hotel Types</h1>
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
                        <h3 class="card-title">List of Hotel Types</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addHotelTypeModal">
                            <i class="fas fa-plus"></i> Add Hotel Type
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="hoteltypesTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $hotelTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotelType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($hotelType->id); ?></td>
                            <td><?php echo e($hotelType->name); ?></td>
                            <td>
                                <a href="<?php echo e(route('hoteltypes.edit', $hotelType->id)); ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('hoteltypes.destroy', $hotelType->id)); ?>" method="POST" style="display:inline;">
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

            <div class="card-footer text-right">
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Hotel Type -->
<div class="modal fade" id="addHotelTypeModal" tabindex="-1" role="dialog" aria-labelledby="addHotelTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addHotelTypeModalLabel">Add Hotel Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('hoteltypes.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Hotel Type Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter hotel type name" required>
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
        $('#hoteltypesTable').DataTable();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\data\htdocs\wfp\laralux\resources\views/admin/hoteltypes/index.blade.php ENDPATH**/ ?>
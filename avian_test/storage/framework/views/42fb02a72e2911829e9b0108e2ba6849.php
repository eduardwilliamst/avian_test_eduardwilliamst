

<?php $__env->startSection('title'); ?>
Hotels
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Hotels</h1>
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
                        <select class="form-control">
                            <option>Select Rating</option>
                            <option>1 Star</option>
                            <option>2 Stars</option>
                            <option>3 Stars</option>
                            <option>4 Stars</option>
                            <option>5 Stars</option>
                        </select>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="<?php echo e(route('hotels.create')); ?>" class="btn btn-primary" data-toggle="modal" data-target="#addHotelModal">
                            <i class="fas fa-plus"></i> Add Hotel
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="hotelsTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Rating</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($hotel->id); ?></td>
                            <td><?php echo e($hotel->name); ?></td>
                            <td><?php echo e($hotel->address); ?></td>
                            <td><?php echo e($hotel->phone); ?></td>
                            <td><?php echo e($hotel->email); ?></td>
                            <td><?php echo e($hotel->rating); ?></td>
                            <td><?php echo e($hotel->hotelType->name); ?></td>
                            <td>
                                <img src="<?php echo e(asset('storage/' . $hotel->image)); ?>" alt="Hotel Image" style="max-width: 100px; max-height: 100px;">
                            </td>
                            <td>
                                <a href="<?php echo e(route('hotels.edit', $hotel->id)); ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('hotels.destroy', $hotel->id)); ?>" method="POST" style="display:inline;">
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


<div class="modal fade" id="addHotelModal" tabindex="-1" role="dialog" aria-labelledby="addHotelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addHotelModalLabel">Add Hotel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('hotels.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Hotel Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter hotel name" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Enter deskripsi" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone number" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <select name="rating" class="form-control" id="rating">
                            <option value="1">1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hotelType">Hotel Type</label>
                        <select name="hotel_type_id" class="form-control" id="hotelType">
                            <?php $__currentLoopData = $hotelTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Hotel Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
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
        $('#hotelsTable').DataTable();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\data\htdocs\wfp\laralux\resources\views/admin/hotels/index.blade.php ENDPATH**/ ?>
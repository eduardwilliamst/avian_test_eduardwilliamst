

<?php $__env->startSection('title'); ?>
Area Sales
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Area Sales</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 text-right">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addDataModalExcel">
                            <i class="fas fa-file-excel"></i> Upload File
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="historyTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Toko</th>
                            <th>Area Sales</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $areaSales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($area->kode_toko); ?></td>
                            <td><?php echo e($area->area_sales); ?></td>
                            <td>
                                <a data-toggle="modal" data-target="#modalEditAreaSales" onclick="modalEdit(<?php echo e($area->kode_toko); ?>)" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('areaSales.destroy', $area->kode_toko)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
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

<!-- Modal Tambah Data -->
<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Data Area Sales</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('areaSales.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="kode_toko">Kode Toko</label>
                        <input type="text" class="form-control" id="kode_toko" name="kode_toko" placeholder="Masukkan kode toko baru">
                    </div>
                    <div class="form-group">
                        <label for="area_sales">Area Sales</label>
                        <input type="text" class="form-control" id="area_sales" name="area_sales" placeholder="Masukkan kode toko lama">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data By Excel -->
<div class="modal fade" id="addDataModalExcel" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Data Area Sales By Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('areaSales.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="kode_toko_baru">Upload File: </label>
                        <input type="file" name="file" accept=".xlsx">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEditAreaSales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="modalContent">

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
    $(document).ready(function() {
        // Initialize datatable
        $('#historyTable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
            ]
        });
    });

    function modalEdit(karyawanId) {
        $.ajax({
            type: 'POST',
            url: '<?php echo e(route("areaSales.getEditForm")); ?>',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': karyawanId,
            },
            success: function(data) {
                $("#modalContent").html(data.msg);
            },
            error: function(xhr) {
                console.log(xhr);
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Kerjaan\avian\avian_test\resources\views/area/index.blade.php ENDPATH**/ ?>
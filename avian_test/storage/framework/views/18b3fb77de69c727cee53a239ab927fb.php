

<?php $__env->startSection('title'); ?>
History Kode Toko
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">History Kode Toko</h1>
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
                            <th>Kode Toko Baru</th>
                            <th>Kode Toko Lama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($history->kode_toko_baru); ?></td>
                            <td><?php echo e($history->kode_toko_lama); ?></td>
                            <td>
                                <a data-toggle="modal" data-target="#modalEditHistory" onclick="modalEdit(<?php echo e($history->kode_toko_baru); ?>)" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('history.destroy', $history->kode_toko_baru)); ?>" method="POST" style="display:inline;">
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
                <h5 class="modal-title" id="addDataModalLabel">Tambah Data History Kode Toko</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('history.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="kode_toko_baru">Kode Toko Baru</label>
                        <input type="text" class="form-control" id="kode_toko_baru" name="kode_toko_baru" placeholder="Masukkan kode toko baru">
                    </div>
                    <div class="form-group">
                        <label for="kode_toko_lama">Kode Toko Lama</label>
                        <input type="text" class="form-control" id="kode_toko_lama" name="kode_toko_lama" placeholder="Masukkan kode toko lama">
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
                <h5 class="modal-title" id="addDataModalLabel">Tambah Data History Kode Toko By Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('history.store')); ?>" method="POST" enctype="multipart/form-data">
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
<div class="modal fade" id="modalEditHistory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="modalContent">

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
    $(document).ready(function() {

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

    function modalEdit(historyId) {
        $.ajax({
            type: 'POST',
            url: '<?php echo e(route("history.getEditForm")); ?>',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': historyId,
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
<?php echo $__env->make('layouts.adminlte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Kerjaan\avian\avian_test\resources\views/history/index.blade.php ENDPATH**/ ?>
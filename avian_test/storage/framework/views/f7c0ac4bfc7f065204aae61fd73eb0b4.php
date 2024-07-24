<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit Data Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="<?php echo e(route('penjualan.update', $penjualan->kode_toko)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="kode_toko">Kode Toko</label>
                <input type="text" class="form-control" id="kode_toko" name="kode_toko" value="<?php echo e($penjualan->kode_toko); ?>" required>
            </div>
            <div class="form-group">
                <label for="nominal_transaksi">Nominal Transaksi</label>
                <input type="text" class="form-control" id="nominal_transaksi" name="nominal_transaksi" value="<?php echo e($penjualan->nominal_transaksi); ?>" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </form>
    </div>
</div><?php /**PATH E:\Kerjaan\avian\avian_test\resources\views/penjualan/modal.blade.php ENDPATH**/ ?>
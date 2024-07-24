<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit Data Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('penjualan.update', $penjualan->kode_toko) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_toko">Kode Toko</label>
                <input type="text" class="form-control" id="kode_toko" name="kode_toko" value="{{ $penjualan->kode_toko }}" required>
            </div>
            <div class="form-group">
                <label for="nominal_transaksi">Nominal Transaksi</label>
                <input type="text" class="form-control" id="nominal_transaksi" name="nominal_transaksi" value="{{ $penjualan->nominal_transaksi }}" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </form>
    </div>
</div>
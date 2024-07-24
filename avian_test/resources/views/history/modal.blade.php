<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit Data History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('history.update', $history->kode_toko_baru) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_toko_baru">Kode Toko Baru</label>
                <input type="text" class="form-control" id="kode_toko_baru" name="kode_toko_baru" value="{{ $history->kode_toko_baru }}" required>
            </div>
            <div class="form-group">
                <label for="kode_toko_lama">Kode Toko Lama</label>
                <input type="text" class="form-control" id="kode_toko_lama" name="kode_toko_lama" value="{{ $history->kode_toko_lama }}" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </form>
    </div>
</div>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit Data Area Sales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('areaSales.update', $areaSales->kode_toko) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_toko">Kode Toko</label>
                <input type="text" class="form-control" id="kode_toko" name="kode_toko" value="{{ $areaSales->kode_toko }}" required>
            </div>
            <div class="form-group">
                <label for="area_sales">Area Sales</label>
                <input type="text" class="form-control" id="area_sales" name="area_sales" value="{{ $areaSales->area_sales }}" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </form>
    </div>
</div>
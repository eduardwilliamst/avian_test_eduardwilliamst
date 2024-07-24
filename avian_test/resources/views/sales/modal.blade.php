<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit Data Master Sales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('sales.update', $sales->kode_sales) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_sales">Kode Sales</label>
                <input type="text" class="form-control" id="kode_sales" name="kode_sales" value="{{ $sales->kode_sales }}" required>
            </div>
            <div class="form-group">
                <label for="nama_sales">Nama Sales</label>
                <input type="text" class="form-control" id="nama_sales" name="nama_sales" value="{{ $sales->nama_sales }}" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </form>
    </div>
</div>
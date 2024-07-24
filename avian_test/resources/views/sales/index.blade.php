@extends('layouts.adminlte')

@section('title')
Master Sales
@endsection

@section('contents')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Master Sales</h1>
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
                <table id="salesTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Sales</th>
                            <th>Nama Sales</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($saless as $sales)
                        <tr>
                            <td>{{ $sales->kode_sales }}</td>
                            <td>{{ $sales->nama_sales }}</td>
                            <td>
                                <a data-toggle="modal" data-target="#modalEditSales" onclick="modalEdit('{{$sales->kode_sales}}')" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('sales.destroy', $sales->kode_sales) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
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
                <h5 class="modal-title" id="addDataModalLabel">Tambah Data Master Sales</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="kode_sales">Kode Sales</label>
                        <input type="text" class="form-control" id="kode_sales" name="kode_sales" placeholder="Masukkan kode toko baru">
                    </div>
                    <div class="form-group">
                        <label for="nama_sales">Nama Sales</label>
                        <input type="text" class="form-control" id="nama_sales" name="nama_sales" placeholder="Masukkan kode toko lama">
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
                <h5 class="modal-title" id="addDataModalLabel">Tambah Data Sales By Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
<div class="modal fade" id="modalEditSales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="modalContent">

    </div>
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        // Initialize datatable
        $('#salesTable').DataTable({
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
    
    function modalEdit(kodeSales) {
        $.ajax({
            type: 'POST',
            url: '{{ route("sales.getEditForm") }}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': String(kodeSales),
            },
            success: function(data) {
                console.log(data);
                $("#modalContent").html(data.msg);
            },
            error: function(xhr) {
                console.log(xhr);
            }
        });
    }
</script>
@endsection
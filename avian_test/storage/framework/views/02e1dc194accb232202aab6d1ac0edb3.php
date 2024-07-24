<?php if(auth()->check()): ?>
    
<?php endif; ?>

<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<?php if (\Illuminate\Support\Facades\Blade::check('role', 'owner')): ?>
<p>Ini hanya bisa dilihat oleh owner.</p>
<?php endif; ?>

<?php if (\Illuminate\Support\Facades\Blade::check('role', 'staff')): ?>
<p>Ini hanya bisa dilihat oleh staff.</p>
<?php endif; ?>

<?php if (\Illuminate\Support\Facades\Blade::check('role', 'pembeli')): ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab" aria-controls="hotel" aria-selected="true">Hotel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="home-apartment-tab" data-toggle="tab" href="#home-apartment" role="tab" aria-controls="home-apartment" aria-selected="false">Rumah & Apt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="flight-hotel-tab" data-toggle="tab" href="#flight-hotel" role="tab" aria-controls="flight-hotel" aria-selected="false">Pesawat + Hotel</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
                    <form class="mt-4">
                        <div class="form-group">
                            <label for="destination">Ketuk kota tujuan atau nama properti</label>
                            <input type="text" class="form-control" id="destination" placeholder="Contoh: Jakarta, Bali">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="check-in">Check-in</label>
                                <input type="date" class="form-control" id="check-in">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="check-out">Check-out</label>
                                <input type="date" class="form-control" id="check-out">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="guests">Jumlah tamu</label>
                            <select id="guests" class="form-control">
                                <option selected>1 dewasa</option>
                                <option>2 dewasa</option>
                                <option>3 dewasa</option>
                                <option>4 dewasa</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Cari</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="home-apartment" role="tabpanel" aria-labelledby="home-apartment-tab">...</div>
                <div class="tab-pane fade" id="flight-hotel" role="tabpanel" aria-labelledby="flight-hotel-tab">...</div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make(auth()->user()->hasRole('owner') || auth()->user()->hasRole('staff') ? 'layouts.adminlte' : 'layouts.pembeli', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\data\htdocs\wfp\laralux\resources\views/dashboard.blade.php ENDPATH**/ ?>
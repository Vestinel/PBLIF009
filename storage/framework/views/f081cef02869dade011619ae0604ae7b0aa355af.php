<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
        <h2 class="dashboard-title">Admin Dashboard</h2>
        <p class="dashboard-subtitle">
            Administrator panel
        </p>
        </div>
        <div class="dashboard-content">
        <div class="row">
            <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-body">
                <div class="dashboard-card-title">
                    User
                </div>
                <div class="dashboard-card-subtitle">
                    <?php echo e($customer); ?>

                </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-body">
                <div class="dashboard-card-title">
                    Peminjaman Belum Kembali 
                </div>
                <div class="dashboard-card-subtitle">
                    
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-body">
                <div class="dashboard-card-title">
                    Jumlah Peminjaman 
                </div>
                <div class="dashboard-card-subtitle">
                    
                </div>
                </div>
            </div>
            </div>
        </div>
        
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laboran\resources\views/pages/admin/dashboard.blade.php ENDPATH**/ ?>
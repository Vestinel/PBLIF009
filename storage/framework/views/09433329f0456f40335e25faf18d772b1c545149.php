<?php $__env->startSection('title'); ?>
    Transactions
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Transactions</h2>
            <p class="dashboard-subtitle">
                Edit Transactions
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(route('transactions.update', $item->id)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="name" class="form-control" value="<?php echo e($item->user->name); ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Total Produk</label>
                                            <input type="text" name="total_product" class="form-control" value="<?php echo e($item->total); ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Borrow Date</label>
                                            <input type="text" name="borrow_date" class="form-control" value="<?php echo e($item->borrow_date); ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Return Date</label>
                                            <input type="text" name="return_date" class="form-control" value="<?php echo e($item->return_date); ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Barang</label>
                                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Produk</th>
                                                        <th>Gambar</th>
                                                        <th>Total Produk</th>
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $transaction_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo e($detail->product->name); ?>

                                                        </td>
                                                        <td>
                                                            
                                                            <img
                                                                src="<?php echo e(Storage::url($detail->product->galleries->first()->photos) ?? ''); ?>"
                                                                class="w-50"/>
                                                        </td>
                                                        <td><?php echo e($detail->total); ?></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="transaction_status" class="form-control">
                                            <option value=<?php echo e($item->transaction_status); ?> selected><?php echo e($item->transaction_status); ?></option>
                                                <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                                                <option value="dipinjam">dipinjam</option>
                                                <option value="Kembali">Kembali</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button class="btn btn-success px-5">
                                            Save now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laboran\resources\views/pages/admin/transaction/edit.blade.php ENDPATH**/ ?>
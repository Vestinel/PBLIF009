<?php $__env->startSection('title'); ?>
    Success Page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="page-content page-success">
            <div class="section-success" data-aos="zoom-in">
                <div class="container">
                    <div
                        class="row align-items-center row-login justify-content-center"
                    >
                        <div class="col-lg-6 text-center">
                            <img
                                src="images/success.svg"
                                alt=""
                                class="mb-4"
                            />
                            <h2>
                                Transaksi Berhasil.
                            </h2>
                            <p>
                                Silahkan hubungi laboran untuk mengambil barang yang dipinjam
                                <br />
                                kami akan menginformasikan resi secepat mungkin!
                            </p>
                            <div>
                            <?php 
                      $roles = Auth::user()->roles;
                      // dd($roles);
                    ?> 

                    <?php if($roles == 'ADMIN'): ?>
                      <a class="btn btn-success w-50 mt-4" href="<?php echo e(route('admin-dashboard')); ?>"
                        >Dashboard</a
                      > 
                    <?php else: ?>
                      <a class="btn btn-success w-50 mt-4" href="<?php echo e(route('dashboard')); ?>"
                        >Dashboard</a
                      > 
                    <?php endif; ?>
                                <a
                                    class="btn btn-signup w-50 mt-2"
                                    href="<?php echo e(route('home')); ?>"
                                >
                                    Kembali ke Halaman Utama
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laboran\resources\views/pages/success.blade.php ENDPATH**/ ?>
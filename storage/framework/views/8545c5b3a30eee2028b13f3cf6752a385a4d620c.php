<?php $__env->startSection('title'); ?>
    Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content page-home">
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                <div class="col-lg-12" data-aos="zoom-in">
                    <div
                    id="storeCarousel"
                    class="carousel slide"
                    data-ride="carousel"
                    >
                    <ol class="carousel-indicators">
                        <li
                        data-target="#storeCarousel"
                        data-slide-to="0"
                        class="active"
                        ></li>
                        
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img
                            src="images/POLTEK.jpg"
                            class="d-block w-100"
                            alt="Carousel Image"
                        />
                        </div>
                        
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
            <section class="store-trend-categories">
            <div class="container">
                <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Categories</h5>
                </div>
                </div>
                <div class="row">
                    <?php $incrementCategory = 0 ?>
                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        
                    <div
                        class="col-6 col-md-3 col-lg-2"
                        data-aos="fade-up"
                        data-aos-delay="<?php echo e($incrementCategory+= 100); ?>"
                    >
                        <a class="component-categories d-block" href="<?php echo e(route('categories-detail', $category->slug)); ?>">
                        <div class="categories-image">
                            <img
                            src="<?php echo e(Storage::url($category->photo)); ?>"
                            alt=""
                            class="w-100"
                            />
                        </div>
                        <p class="categories-text">
                            <?php echo e($category->name); ?>

                        </p>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-12 text-center"
                            data-aos="fade-up"
                            data-aos-delay="100">
                            No Categories Found
                        </div>
                        
                    <?php endif; ?>
            </div>
            </section>
            <section class="store-new-products">
                <div class="container">
                    <div class="row">
                        <div class="col-12" data-aos="fade-up">
                            <h5>All Tools</h5>
                        </div>
                    </div>
                    <div class="row">
                        <?php $incrementProduct = 0 ?>
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div
                            class="col-6 col-md-4 col-lg-3"
                            data-aos="fade-up"
                            data-aos-delay="<?php echo e($incrementProduct+= 100); ?>"
                        >
                            <a class="component-products d-block" href="<?php echo e(route('detail', $product->slug)); ?>">
                            <div class="products-thumbnail">
                                <div
                                class="products-image"
                                style="
                                    <?php if($product->galleries->count()): ?>
                                        background-image: url('<?php echo e(Storage::url($product->galleries->first()->photos)); ?>');
                                    <?php else: ?>
                                        background-color: #eee
                                    <?php endif; ?>
                                "
                                ></div>
                            </div>
                            <div class="products-text">
                                <?php echo e($product->name); ?>

                            </div>
                            <div class="products-price">
                                <?php echo e($product->price); ?>

                            </div>
                            </a>
                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-12 text-center"
                            data-aos="fade-up"
                            data-aos-delay="100">
                            No Products Found
                        </div>
                        
                        <?php endif; ?>
                    </div>
                </div>
            </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laboran\resources\views/pages/home.blade.php ENDPATH**/ ?>
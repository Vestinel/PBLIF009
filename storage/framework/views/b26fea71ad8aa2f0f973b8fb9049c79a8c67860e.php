<?php $__env->startSection('title'); ?>
    Articles
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
                        <li data-target="#storeCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#storeCarousel" data-slide-to="1"></li>
                        <li data-target="#storeCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img height="500px" src="images/RAPI.jpg" class="d-block w-100" alt="Carousel Image"/>
                        </div>
                        <div class="carousel-item">
                        <img height="500px" src="images/LANTST.jpg" class="d-block w-100" alt="Carousel Image"/>
                        </div>
                        <div class="carousel-item">
                        <img height="500px" src="images/RJ.jpg" class="d-block w-100" alt="Carousel Image"/>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>

            <section class="store-new-products">
                <div class="container">
                    <div class="row">
                        <div class="col-12" data-aos="fade-up">
                            <h5>Articles</h5>
                        </div>
                    </div>
                    <div class="row">
                        <?php $incrementArticle = 0 ?>
                        <?php $__empty_1 = true; $__currentLoopData = $article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div
                            class="col-6 col-md-4 col-lg-3"
                            data-aos="fade-up"
                            data-aos-delay="<?php echo e($incrementArticle+= 100); ?>"
                        >
                            <a class="component-products d-block" href="<?php echo e(route('detail-troubleshoot', $article->slug)); ?>">
                            <div class="products-thumbnail">
                                <div
                                class="products-image"
                                style="
                                    <?php if($article->galleries->count()): ?>
                                        background-image: url('<?php echo e(Storage::url($article->galleries->first()->photos)); ?>');
                                    <?php else: ?>
                                        background-color: #eee
                                    <?php endif; ?>
                                "
                                ></div>
                            </div>
                            <div class="products-text">
                                <?php echo e($article->name); ?>

                            </div>
                            <div class="products-price">
                                
                            </div>
                            </a>
                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-12 text-center"
                            data-aos="fade-up"
                            data-aos-delay="100">
                            No Article Found
                        </div>
                        
                        <?php endif; ?>
                    </div>
                </div>
            </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laboran\resources\views/pages/troubleshoot.blade.php ENDPATH**/ ?>
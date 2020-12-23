
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section id="header" class="backg backg-one"  style="background-color: transparent; background-image: linear-gradient(to top, #ffffff 0%, <?php echo e($set->m_c); ?> 60%);">
    <div class="container">
        <div class="backg-content-wrap">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="backg-content">
                        <span class="discount wow soneFadeUp"  style="background-color: <?php echo e($set->s_c); ?>;" data-wosw-delay="0.3s"><?php echo e($set->title); ?></span><br>
                        <span class="backg-title wow soneFadeUp" data-wow-delay="0.5s"><?php echo e(__('Terms & Conditions')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-shape bg-shape-bottom">
        <img src="<?php echo e(url('/')); ?>/asset/images/shape-bg.png">
    </div>
</section>
<section class="about genera-informes wow soneFadeUp">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="section-title">
                        <p><?php echo $about->terms; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/front/terms.blade.php ENDPATH**/ ?>
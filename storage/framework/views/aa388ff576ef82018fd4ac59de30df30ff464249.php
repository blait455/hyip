
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section id="header" class="backg backg-one" style="background-color: transparent; background-image: linear-gradient(to top, #ffffff 0%, <?php echo e($set->m_c); ?> 60%);">
    <div class="container">
        <div class="backg-content-wrap">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="backg-content">
                        <span class="discount wow soneFadeUp" style="background-color: <?php echo e($set->s_c); ?>;" data-wosw-delay="0.3s"><?php echo e($set->title); ?></span><br>
                        <span class="backg-title wow soneFadeUp" data-wow-delay="0.5s"><?php echo e(__('Frequently asked questions')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-shape bg-shape-bottom">
        <img src="<?php echo e(url('/')); ?>/asset/images/shape-bg.png">
    </div>
</section>
<section class="revolutionize revolutionize-two wow soneFadeUp">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-title text-left">
                    <p class="title">
                    <?php echo e($ui->s5_title); ?>

</p>

                    <p>
                    <?php echo e($ui->s5_body); ?>

                    </p>
                </div>
            </div>
            <div id="accordion" class="col-lg-8 faq">
                <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vfaq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div class="card-header" style="background-color: <?php echo e($set->m_c); ?>;" id="heading<?php echo e($vfaq->id); ?>">
                        <span><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo e($vfaq->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($vfaq->id); ?>"><?php echo e($vfaq->question); ?></button></span>
                    </div>
                    <div id="collapse<?php echo e($vfaq->id); ?>" class="collapse" aria-labelledby="heading<?php echo e($vfaq->id); ?>" data-parent="#accordion" style="">
                        <div class="card-body">
                            <p><?php echo $vfaq->answer; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/front/faq.blade.php ENDPATH**/ ?>
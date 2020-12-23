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
                        <span class="backg-title wow soneFadeUp" data-wow-delay="0.5s">
                        <?php echo e(__('Plans that gives assured profits')); ?>

                        </span><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-shape bg-shape-bottom">
        <img src="<?php echo e(url('/')); ?>/asset/images/shape-bg.png">
    </div>
</section>
<section class="pricing-two pt-100 wow soneFadeUp">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title" style="color: <?php echo e($set->s_c); ?>;"><?php echo e(__('Pricing Packages')); ?></span>
            <p class="title">
            <?php echo e(__('Choose your package')); ?>

            </p>
        </div>
        <div class="row advanced-pricing-table no-gutters">
            <?php $__currentLoopData = $plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3">
                <div class="pricing-table" style="background-color: <?php echo e($set->m_c); ?>;">
                    <div class="pricing-header pricing-amount">
                        <h2 class="price-title"><?php echo e($val->name); ?></h2>
                        <br>
                        <p class="text-secondary">Category: <span class="badge"><?php echo e($val->category); ?></span></p>
                        <?php if($val->sub_cat): ?>
                            <p class="text-secondary">Sub-category: <span class="badge"><?php echo e($val->sub_cat); ?></span></p>
                        <?php endif; ?>
                        
                        <div class="monthly_price">
                            <h2 class="price" style="color: <?php echo e($set->s_c); ?>;"><?php echo e($currency->symbol.number_format($val->min_deposit)); ?></h2>
                        </div>
                        <div class="small_desc text-center">
                            
                            
                            <?php if($val->percent): ?>
                                <span class="castrooo"><?php echo e($val->percent); ?>% intrest rate Weekly</span><br>                                
                            <?php endif; ?>
                            <?php if($val->amount): ?>
                                <span class="castrooo"><?php echo e($currency->symbol.number_format($val->amount)); ?> <?php echo e(__('Maximum')); ?></span><br>
                            <?php endif; ?>
                            <?php if($val->ref_percent!=null): ?>
                            <span class="castrooo"><?php echo e($val->ref_percent); ?>% <?php echo e(__('Referral Bonus')); ?></span><br>
                            <?php endif; ?>
                            <?php if($val->bonus!=null): ?>
                            <span class="castrooo"><?php echo e($val->bonus); ?>% <?php echo e(__('Compondment Bonus')); ?></span><br>
                            <?php endif; ?>
                        </div><br>
                        <p><strong><?php echo e($val->description); ?></strong></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/toor/Documents/core/resources/views/front/plans.blade.php ENDPATH**/ ?>

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
                        <span class="backg-title wow soneFadeUp" data-wow-delay="0.5s"><?php echo e(__('Contact Us')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-shape bg-shape-bottom">
        <img src="<?php echo e(url('/')); ?>/asset/images/shape-bg.png">
    </div>
</section>
<?php if($set->contact==1): ?>
<section id="contact" class="wow soneFadeUp" data-wow-delay="0.3s">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-froms">
                    <form action="<?php echo e(route('contact-submit')); ?>" method="post" class="contact-form" data-saasone="contact-froms">
                    <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                            <input type="text" name="name" placeholder="Name" required>
                            <input type="text" name="mobile" placeholder="Mobile" required>
                            </div>
                        </div>
                        <input type="email" name="email" placeholder="Email" required>
                        <textarea name="message" placeholder="Your Message" required></textarea> 

                        <button type="submit" class="btn btn-sm btn-soft-primary btn-pill"><?php echo e(__('Send')); ?><i class="fas fa-angle-right ml-1"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/front/contact.blade.php ENDPATH**/ ?>
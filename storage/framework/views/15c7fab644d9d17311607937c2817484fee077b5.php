
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
                        <span class="backg-title wow soneFadeUp" data-wow-delay="0.5s"><?php echo e(__('About us')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-shape bg-shape-bottom">
        <img src="<?php echo e(url('/')); ?>/asset/images/shape-bg.png">
    </div>
</section>
<?php if(count($team)>0): ?>
<section class="teams-single wow soneFadeUp d-none d-lg-block">
    <div class="container">
        <div class="section-title text-center">
            <h3 class="sub-title" style="color:<?php echo e($set->s_c); ?>;"><?php echo e(__('Our Team')); ?></h3>
            <p class="title"><?php echo e(__('The Experts Team')); ?></p>
            <p> <?php echo e($ui->team); ?></p>
        </div>
        <div class="row">
        <?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-3">
                <div class="team-member">
                    <div class="member-avater"><img src="<?php echo e(url('/')); ?>/asset/review/<?php echo e($val->image); ?>" alt="avater">
                        <div class="layer-one">
                            <div class="team-info">
                                <span class="name"><?php echo e($val->name); ?></span>
                                <p class="job"><?php echo e($val->position); ?></p>
                            </div>
                        </div>

                        <ul class="member-social">
                            <li><a href="<?php echo e($val->facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="<?php echo e($val->twitter); ?>"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="<?php echo e($val->linkedin); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<section class="about genera-informes wow soneFadeUp">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="section-title">
                        <p><?php echo $about->about; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if($set->review==1): ?>
    <?php if(count($review)>0): ?>
        <section class="testimonials-two wow soneFadeUp" id="testimonialxx">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="sub-title" style="color: <?php echo e($set->s_c); ?>;"><?php echo e(__('Reviews')); ?></span>
                            <h2 class="title"><?php echo e($ui->s7_title); ?></h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div id="testimonial-wrapper">
                            <div class="swiper-container" id="testimonial-two" data-speed="700" data-autoplay="7000" data-perpage="3" data-space="50" data-breakpoints='{"991": {"slidesPerView": 1}}'>
                                <div class="swiper-wrapper">
                                    <?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vreview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-two">
                                                <div class="testi-content-inner">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                    <div class="testimonial-content">
                                                        <p><?php echo e($vreview->review); ?></p>
                                                    </div> 
                                                    <div class="testimonial-bio">
                                                        <div class="avatar"><img src="<?php echo e(url('/')); ?>/asset/review/<?php echo e($vreview->image_link); ?>" alt="testimonial"></div>
                                                        <div class="bio-info">
                                                            <h4 class="name"><?php echo e($vreview->name); ?></h4>
                                                            <p class="job"><?php echo e($vreview->occupation); ?></p>
                                                        </div>
                                                    </div>       
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/toor/Documents/core/resources/views/front/about.blade.php ENDPATH**/ ?>
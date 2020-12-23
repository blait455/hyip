
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div style="background-color:<?php echo e($set->m_c); ?>;">
    <section id="header" class="backg backg-one">
        <div class="container">
            <div class="backg-content-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-6">                   
                        <div class="backg-content">
                            <h1 class="backg-title wow soneFadeUp" data-wow-delay="0.5s"><?php echo e($ui->header_title); ?></h1>
                            <p class="description wow soneFadeUp text-dark" data-wow-delay="0.6s">
                            <?php echo e($ui->header_body); ?>

                            </p>
                            <a class="btn btn-sm btn-soft-primary btn-pill" href="<?php echo e(route('register')); ?>"><?php echo e(__('Get Started')); ?><i class="fas fa-angle-right ml-1"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="promo-mockup mockup-mobile wow soneFadeUp">
                            <img class="mockup-mobile-img-1" src="<?php echo e(url('/')); ?>/asset/images/<?php echo e($ui->s6_image); ?>" alt="header">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="feature-box">
                        <div class="row">
                            <div class="col-lg-6 flex-center">
                                <div class="featured-icon-box-wrapper style-five">
                                    <div class="featured-icon-box-icon"><img src="<?php echo e(url('/')); ?>/asset/images/<?php echo e($ui->s2_image); ?>"></div>
                                    <div class="featured-icon-box-content">
                                        <span class="featured-icon-box-title"><?php echo e($ui->item1_title); ?></span>
                                        <p><?php echo e($ui->item1_body); ?></p>
                                    </div>
                                </div>                            
                            </div>
                            <div class="col-lg-6 ">
                                <div class="featured-icon-box-wrapper style-five">
                                    <div class="featured-icon-box-icon"><img src="<?php echo e(url('/')); ?>/asset/images/<?php echo e($ui->s3_image); ?>"></div>
                                    <div class="featured-icon-box-content">
                                        <span class="featured-icon-box-title"><?php echo e($ui->item2_title); ?></span>
                                        <p><?php echo e($ui->item2_body); ?></p>
                                    </div>
                                </div>
                                <div class="featured-icon-box-wrapper style-five">
                                    <div class="featured-icon-box-icon"><img src="<?php echo e(url('/')); ?>/asset/images/<?php echo e($ui->s4_image); ?>"></div>
                                    <div class="featured-icon-box-content">
                                        <span class="featured-icon-box-title"><?php echo e($ui->item3_title); ?></span>
                                        <p><?php echo e($ui->item3_body); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 flex-center">
                    <div class="section-title style-two">
                        <h2 class="title"><?php echo e($ui->s2_title); ?></h2>
                        <p><?php echo e($ui->s2_body); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php if($set->services==1): ?>
<section class="services pb-150 wow soneFadeUp">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title" style="color:<?php echo e($set->s_c); ?>;"><?php echo e(__('Services')); ?></span>
            <p class="title"><?php echo e($ui->s4_title); ?></p>
            <p><?php echo e($ui->s4_body); ?></p>
        </div>

        <div class="row gap-y">
        <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-xl-3">
                <div class="services-box-wrapper text-center bg-white">
                    <div class="my-3 services-box-icon bg-white" style="color:<?php echo e($set->s_c); ?>;"><i class="fa fa-<?php echo e($services->icon); ?>"></i></div>
                    <span class="mb-20 fw-500 text-black"><?php echo e($services->title); ?></span>
                    <p class="castrooo"><?php echo e($services->details); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<section class="informes wow soneFadeRight">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="editure-feature-image">
                    <div class="image-one">
                        <img src="<?php echo e(url('/')); ?>/asset/images/<?php echo e($ui->s7_image); ?>" class="wow soneFadeRight r10" data-wow-delay="0.3s" alt="feature-image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="img-text-content">
                    <div class="section-title">
                        <h2 class="title"><?php echo e($ui->s6_title); ?></h2>
                        <p><?php echo e($ui->s6_body); ?></p>
                    </div>
                    <a href="<?php echo e(route('about')); ?>" class="btn btn-sm btn-soft-primary btn-pill"><?php echo e(__('Learn More')); ?><i class="fas fa-angle-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if($set->plan==1): ?>
<section class="pricing-two pt-100 wow soneFadeUp">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title" style="color: <?php echo e($set->s_c); ?>;"><?php echo e(__('Pricing Plan')); ?></span>
            <h2 class="title"><?php echo e(__('Choose your pricing policy which affordable')); ?></h2>
        </div>
        <div class="row advanced-pricing-table no-gutters">
            <?php $__currentLoopData = $plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3">
                <div class="pricing-table bg-white">
                    <div class="pricing-header pricing-amount">
                        <h2 class="price-title"><?php echo e($val->name); ?></h2>
                        <p><?php echo e(__('Payouts wont be available till end of plan duration')); ?></p>
                        <div class="monthly_price">
                            <h2 class="price" style="color: <?php echo e($set->s_c); ?>;"><?php echo e($currency->symbol.number_format($val->min_deposit)); ?></h2>
                        </div>
                        <div class="small_desc text-center">
                            <span class="castrooo"><?php echo e(__('Profit Topup is Automated')); ?></span><br>
                            <span class="castrooo"><?php echo e(__('For')); ?> <?php echo e($val->duration); ?> <?php echo e($val->period); ?>(s)</span><br>
                            <span class="castrooo"><?php echo e($val->percent); ?> <?php echo e(__('Daily Percent')); ?></span><br>
                            <span class="castrooo"><?php echo e($currency->symbol.number_format($val->amount)); ?> <?php echo e(__('Maximum Price')); ?></span><br>
                            <?php if($val->ref_percent!=null): ?>
                            <span class="castrooo"><?php echo e($val->ref_percent); ?>% <?php echo e(__('Referral Percent')); ?></span><br>
                            <?php endif; ?>
                            <?php if($val->bonus!=null): ?>
                            <span class="castrooo"><?php echo e($val->bonus); ?>% <?php echo e(__('Trading Bonus')); ?></span><br>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
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
                                                        <p><?php echo $vreview->review; ?></p>
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
<?php if($set->team==1): ?>
    <?php if(count($team)>0): ?>
        <section class="teams-single wow soneFadeUp d-none d-lg-block">
            <div class="container">
                <div class="section-title text-center">
                    <h3 class="sub-title" style="color: <?php echo e($set->s_c); ?>;"><?php echo e(__('Our Team')); ?></h3>
                    <h2 class="title"><?php echo e($ui->s3_body); ?></h2>
                    <p> <?php echo e($ui->team); ?></p>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
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
<?php endif; ?>
<?php if($set->stat==1): ?>
<section class="countup">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title" style="color: <?php echo e($set->s_c); ?>;"><?php echo e(__('Get Assured Profits')); ?></span>
            <p class="title"><?php echo e($ui->s8_title); ?></p>
            <p><?php echo e($ui->s8_body); ?></p>
        </div>
        <div class="countup-wrapper">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="fun-fact text-center">
                        <div class="counter">
                            <h4 class="count" style="color: <?php echo e($set->s_c); ?>;"><?php echo e($currency->symbol.number_format($t_profit)); ?></h4></div>
                        <p>Profit Shared</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="fun-fact text-center">
                        <div class="counter">
                            <h4 class="count" style="color: <?php echo e($set->s_c); ?>;"><?php echo e($currency->symbol.number_format($t_amount)); ?></h4></div>
                        <p>Money Invested</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="fun-fact text-center">
                        <div class="counter">
                            <h4 class="count" style="color: <?php echo e($set->s_c); ?>;"><?php echo e($currency->symbol.number_format($t_bonus)); ?></h4></div>
                        <p>Trading Bonus</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="fun-fact text-center">
                        <div class="counter">
                            <h4 class="count" style="color: <?php echo e($set->s_c); ?>;"><?php echo e($currency->symbol.number_format($t_payout)); ?></h4></div>
                        <p>Payouts</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="featured-slider pt-50">
            <div class="row">
                <div class="swiper-container" id="featured" data-speed="1000" data-autoplay="5000" data-perpage="3" data-breakpoints='{"1024": {"slidesPerView": 2}, "768": {"slidesPerView": 1}}'>
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $withdraw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="testimonial-two">
                                <div class="testi-content-inner">
                                    <div class="testimonial-bio">                                      
                                        <?php if(empty($val->user['image'])): ?>
                                            <?php $cast="react.jpg"; ?>
                                        <?php else: ?>
                                            <?php $cast=$val->user['image']; ?>
                                        <?php endif; ?>                                       
                                        <div class="avatar"><img src="<?php echo e(url('/')); ?>/asset/profile/<?php echo e($cast); ?>" alt="testimonial"></div>
                                        <div class="bio-info">
                                            <h4 class="name"><?php echo e($val->user['first_name']." ".$val->user['last_name']); ?></h4>
                                            <p class="job"><?php echo e($val->wallet->method); ?> - <?php echo e($currency->symbol.number_format($val->amount)); ?></p>
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
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/front/index.blade.php ENDPATH**/ ?>
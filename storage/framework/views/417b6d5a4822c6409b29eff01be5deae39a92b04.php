<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title><?php echo e($title); ?> - <?php echo e($set->site_name); ?></title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="robots" content="index, follow">
        <meta name="apple-mobile-web-app-title" content="<?php echo e($set->site_name); ?>"/>
        <meta name="application-name" content="<?php echo e($set->site_name); ?>"/>
        <meta name="msapplication-TileColor" content="<?php echo e($set->m_c); ?>"/>
        <meta name="description" content="<?php echo e($set->site_desc); ?>" />
        <link rel="shortcut icon" href="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link2); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/asset/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/asset/vendor/swiper/css/swiper.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/asset/vendor/wow/css/animate.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/asset/vendor/magnific-popup/css/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/css/app.css" type="text/css">
        <link href="<?php echo e(url('/')); ?>/asset/fonts/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo e(url('/')); ?>/asset/vendor/fontawesome/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/css/sweetalert.css" type="text/css">
         <?php echo $__env->yieldContent('css'); ?>
    </head>
<body data-style="default">
    <div class="boompay">
        <header class="navbar-header navbar-trans-fixed">
            <div class="container">
                <div class="header-inner">
                    <div class="toggle-menu">
                        <span class="bar bg-dark"></span>
                        <span class="bar bg-dark"></span>
                        <span class="bar bg-dark"></span>
                    </div>
                    <div class="navbar-mobile-logo">
                        <a href="<?php echo e(route('home')); ?>" class="logo">
                        <img src="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link); ?>" alt="logo" class="main-logo"> 
                        <img src="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link); ?>" alt="logo" class="sticky-logo">
                        </a>
                    </div>
                    <nav class="navbar-nav nav-dark">
                        <div class="close-menu">
                            <i class="fa fa-close"></i>
                        </div>
                        <div class="navbar-logo">
                            <a href="<?php echo e(route('home')); ?>" class="logo">
                                <img src="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link); ?>" alt="logo" class="main-logo"> 
                                <img src="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link); ?>" alt="logo" class="sticky-logo">
                            </a>
                        </div>
                        <div class="menu-wrapper" data-top="992">
                            <ul class="navbar-main-menu">  
                                <?php if($set->plan==1): ?>       
                                <li><a href="<?php echo e(route('plans')); ?>"><?php echo e(__('Subscription')); ?></a></li>
                                <?php endif; ?>                  
                                <li class="menu-item-has-children">
                                    <a href="javascript:void;"><?php echo e(__('Help')); ?></a>
                                    <ul class="sub-menu">
                                        <?php if($set->faq==1): ?>
                                        <li><a href="<?php echo e(route('faq')); ?>"><?php echo e(__('FAQs')); ?></a></li>
                                        <?php endif; ?>
                                        <?php if($set->blog==1): ?>
                                        <li><a href="<?php echo e(route('blog')); ?>"><?php echo e(__('Supporting articles')); ?></a></li>
                                        <?php endif; ?>
                                        <li><a href="<?php echo e(route('terms')); ?>"><?php echo e(__('Terms & Conditions')); ?></a></li>
                                        <li><a href="<?php echo e(route('privacy')); ?>"><?php echo e(__('Privacy Policy')); ?></a></li>
                                        <?php if($set->contact==1): ?>
                                        <li><a href="<?php echo e(route('contact')); ?>"><?php echo e(__('Contact us')); ?></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void;"><?php echo e(__('More')); ?></a>
                                    <ul class="sub-menu">
                                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vpages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!empty($vpages)): ?>
                                                <li><a href="<?php echo e(url('/')); ?>/page/<?php echo e($vpages->id); ?>"><?php echo e($vpages->title); ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                                <li><a href="<?php echo e(route('about')); ?>"><?php echo e(__('About us')); ?></a></li>
                                <?php if(Auth::guard('user')->check()): ?>
                                <?php else: ?>
                                <li><a href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
                                <?php endif; ?>
                                <?php if($set->language==1): ?>
                                    <li class="menu-item-has-children">
                                        <?php $locale = session()->get('locale'); ?>
                                        <a href="javascript:void;">
                                        <?php switch($locale):
                                            case ('fr'): ?>
                                            <span class="mb-0 text-sm"><span class="france"></span> French</span>
                                            <?php break; ?>
                                            <?php case ('ge'): ?>
                                            <span class="mb-0 text-sm"><span class="germany"></span> German</span>
                                            <?php break; ?>
                                            <?php case ('es'): ?>
                                            <span class="mb-0 text-sm"><span class="spain"></span> Spanish</span>
                                            <?php break; ?>
                                            <?php case ('in'): ?>
                                            <span class="mb-0 text-sm"><span class="hindi"></span> Hindi</span>
                                            <?php break; ?>                        
                                            <?php case ('ch'): ?>
                                            <span class="mb-0 text-sm"><span class="china"></span> China</span>
                                            <?php break; ?>
                                            <?php default: ?>
                                            <span class="mb-0 text-sm"><span class="usa"></span> English</span>
                                        <?php endswitch; ?>
                                        </a>
                                        <ul class="sub-menu">
                                            <li><a href="<?php echo e(url('/')); ?>/lang/en">English</a></li>
                                            <li><a href="<?php echo e(url('/')); ?>/lang/fr">France</a></li>
                                            <li><a href="<?php echo e(url('/')); ?>/lang/ge">Germany</a></li>
                                            <li><a href="<?php echo e(url('/')); ?>/lang/ch">China</a></li>
                                            <li><a href="<?php echo e(url('/')); ?>/lang/in">Hindi</a></li>
                                            <li><a href="<?php echo e(url('/')); ?>/lang/es">Spanish</a></li>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <div class="nav-right">
                                <?php if(Auth::guard('user')->check()): ?>
                                <a href="<?php echo e(route('user.dashboard')); ?>" class="nav-btn"><?php echo e(__('Dashboard')); ?></a>
                                <?php else: ?>
                                <a href="<?php echo e(route('register')); ?>" class="nav-btn"><?php echo e(__('Join us')); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
<?php echo $__env->yieldContent('content'); ?>
        <footer id="footer" class="wow soneFadeUp">
            <div class="container">
                <div class="footer-nner">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="widget footer-widget style_logo">
                                        <p><?php echo e($set->site_desc); ?></p>
                                        <?php if($set->contact==1): ?>
                                            <p><?php echo e($set->email); ?><br><?php echo e($set->mobile); ?></p>
                                            <p><?php echo e($set->address); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="widget footer-widget">
                                        <span class="widget-title text-uppercase"><?php echo e(__('Quick links')); ?></span>
                                        <ul class="footer-menu">
                                            <li><a href="<?php echo e(route('user.plans')); ?>"><?php echo e(__('Plans')); ?></a></li>
                                            <li><a href="<?php echo e(route('user.ticket')); ?>"><?php echo e(__('Disputes')); ?></a></li>
                                            <li><a href="<?php echo e(route('user.fund')); ?>"><?php echo e(__('Fund account')); ?></a></li>
                                            <?php if(count($faq)>0): ?>
                                                <li><a href="<?php echo e(route('user.ownbank')); ?>"><?php echo e(__('Send money')); ?></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>                         
                                <div class="col-lg-4 col-md-6">
                                    <div class="widget footer-widget">
                                        <span class="widget-title text-uppercase"><?php echo e(__('Company')); ?></span>
                                        <ul class="footer-menu">
                                            <li><a href="<?php echo e(route('about')); ?>"><?php echo e(__('About us')); ?></a></li>
                                            <li><a href="<?php echo e(route('terms')); ?>"><?php echo e(__('Terms & Conditions')); ?></a></li>
                                            <li><a href="<?php echo e(route('privacy')); ?>"><?php echo e(__('Privacy Policy')); ?></a></li>
                                            <?php if(count($faq)>0): ?>
                                                <li><a href="<?php echo e(route('faq')); ?>"><?php echo e(__('FAQs')); ?></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>                
                                <div class="col-lg-4 col-md-6">
                                    <div class="widget footer-widget">
                                        <span class="widget-title text-uppercase"><?php echo e(__('More')); ?></span>
                                        <ul class="footer-menu">
                                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vpages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty($vpages)): ?>
                                                    <li><a href="<?php echo e(url('/')); ?>/page/<?php echo e($vpages->id); ?>"><?php echo e($vpages->title); ?></a></li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site-info">
                    <div class="copyright">
                        <p><?php echo e($set->site_name); ?>  &copy; <?php echo e(date('Y')); ?>. <?php echo e(__('All Rights Reserved.')); ?></p>
                    </div>
                    <ul class="footer-social-link">
                        <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socials): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($socials->value)): ?>
                                <li><a href="<?php echo e($socials->value); ?>" class="icon-<?php echo e($socials->type); ?>"><i class="fab fa-<?php echo e($socials->type); ?>"></i></a></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </ul>
                </div>
            </div>
        </footer>
        <?php if(isset($set->tawk_id)): ?>
            <script type="text/javascript">
                var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/<?php echo e($set->tawk_id); ?>/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
                })();
            </script>
        <?php endif; ?>
        <a href="#header" data-type="section-switch" class="return-to-top"><i class="fa fa-chevron-up"></i></a>
        <script src="<?php echo e(url('/')); ?>/asset/vendor/popper.js/popper.min.js"></script>
        <script src="<?php echo e(url('/')); ?>/asset/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo e(url('/')); ?>/asset/js/particles.js"></script>
        <script src="<?php echo e(url('/')); ?>/asset/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo e(url('/')); ?>/asset/vendor/swiper/js/swiper.min.js"></script>
        <script src="<?php echo e(url('/')); ?>/asset/vendor/jquery.appear/jquery.appear.js"></script>
        <script src="<?php echo e(url('/')); ?>/asset/vendor/wow/js/wow.min.js"></script>
        <script src="<?php echo e(url('/')); ?>/asset/vendor/countUp.js/countUp.min.js"></script>
        <script src="<?php echo e(url('/')); ?>/asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="<?php echo e(url('/')); ?>/asset/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="<?php echo e(url('/')); ?>/asset/vendor/jquery.parallax-scroll/js/jquery.parallax-scroll.js"></script>
        <script src="<?php echo e(url('/')); ?>/asset/vendor/magnific-popup/js/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo e(url('/')); ?>/asset/vendor/theia-sticky-sidebar/theia-sticky-sidebar.min.js"></script>
        <!-- Site Scripts -->
        <script src="<?php echo e(url('/')); ?>/asset/js/header.js"></script>
        <script src="<?php echo e(url('/')); ?>/asset/js/app.js"></script>
        <script src="<?php echo e(url('/')); ?>/asset/js/sweetalert.js"></script>

        <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('script'); ?>
        <?php if(session('success')): ?>
            <script>
                $(document).ready(function () {
                    swal("Success!", "<?php echo e(session('success')); ?>", "success");
                });
            </script>
        <?php endif; ?>
        <?php if(session('alert')): ?>
            <script>
                $(document).ready(function () {
                    swal("Sorry!", "<?php echo e(session('alert')); ?>", "error");
                });
            </script>
        <?php endif; ?>
        <script>
                    <?php if(Session::has('message')): ?>
            var type = "<?php echo e(Session::get('alert-type','info')); ?>";
            switch (type) {
                case 'info':
                    toastr.info("<?php echo e(Session::get('message')); ?>");
                    break;
                case 'warning':
                    toastr.warning("<?php echo e(Session::get('message')); ?>");
                    break;
                case 'success':
                    toastr.success("<?php echo e(Session::get('message')); ?>");
                    break;
                case 'error':
                    toastr.error("<?php echo e(Session::get('message')); ?>");
                    break;
            }
            <?php endif; ?>
        </script>
        </div>
    </body>
</html><?php /**PATH C:\xampp\htdocs\hyip\resources\views/layout.blade.php ENDPATH**/ ?>
<!doctype html>
<html class="no-js" lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <base href="<?php echo e(url('/')); ?>"/>
        <title><?php echo e($title); ?> | <?php echo e($set->site_name); ?></title>
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="description" content="<?php echo e($set->site_desc); ?>" />
        <link rel="shortcut icon" href="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link2); ?>" />
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/dashboard/vendor/nucleo/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/dashboard/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/dashboard/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/dashboard/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
		<link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/dashboard/vendor/quill/dist/quill.core.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/dashboard/css/argon.css?v=1.1.0" type="text/css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/css/sweetalert.css" type="text/css">
        <link href="<?php echo e(url('/')); ?>/asset/fonts/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
         <?php echo $__env->yieldContent('css'); ?>
    </head>
<!-- header begin-->
<body>
<div class="preloader"></div>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light" style="background-color:<?php echo e($set->m_c); ?>;" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
          <img src="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link); ?>" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php if(route('admin.dashboard')==url()->current()): ?> active <?php endif; ?> text-dark" href="<?php echo e(route('admin.dashboard')); ?>">
                <i class="fa fa-television"></i>
                <span class="nav-link-text"><?php echo e(__('Summary')); ?></span>
              </a>
            </li>                                             
          </ul>
          <hr class="my-3">
          <h6 class="navbar-heading p-0 text-muted"><?php echo e(__('Client')); ?></h6>
          <ul class="navbar-nav mb-md-3"> 
            <li class="nav-item">
              <a class="nav-link <?php if(route('admin.users')==url()->current()): ?> active <?php endif; ?> text-dark" href="<?php echo e(route('admin.users')); ?>">
                <i class="fa fa-user"></i>
                <span class="nav-link-text"><?php echo e(__('Customers')); ?></span>
              </a>
            </li>            
            <li class="nav-item">
              <a class="nav-link <?php if(route('admin.ticket')==url()->current()): ?> active <?php endif; ?> text-dark" href="<?php echo e(route('admin.ticket')); ?>">
                <i class="fa fa-feed"></i>
                <span class="nav-link-text"><?php echo e(__('Support ticket')); ?></span>
              </a>
            </li>             
            <li class="nav-item">
              <a class="nav-link <?php if(route('admin.promo')==url()->current()): ?> active <?php endif; ?> text-dark" href="<?php echo e(route('admin.promo')); ?>">
                <i class="fa fa-envelope"></i>
                <span class="nav-link-text"><?php echo e(__('Promotional Emails')); ?></span>
              </a>
            </li>            
            <li class="nav-item">
              <a class="nav-link <?php if(route('admin.message')==url()->current()): ?> active <?php endif; ?> text-dark" href="<?php echo e(route('admin.message')); ?>">
                <i class="fa fa-commenting"></i>
                <span class="nav-link-text"><?php echo e(__('Messages')); ?></span>
              </a>
            </li>  
			<li class="nav-item">
                <a class="nav-link <?php if(route('admin.deposit.method')==url()->current() || route('admin.banktransfer')==url()->current() || route('admin.deposit.log')==url()->current()): ?> active <?php endif; ?> text-dark" href="#card" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                  <i class="fa fa-bookmark-o"></i>
                  <span class="nav-link-text"><?php echo e(__('Deposit')); ?>

				  <?php if(count($pdeposit)>0 || count($pbank)>0): ?>
                  <span class="badge badge-sm badge-circle badge-floating badge-danger border-white">
                  <?php echo e(count($pdeposit) + count($pbank)); ?>

                  </span>
                  <?php endif; ?></span>
                </a>
                <div class="collapse <?php if(route('admin.deposit.method')==url()->current() || route('admin.banktransfer')==url()->current() || route('admin.deposit.log')==url()->current()): ?> show <?php endif; ?>" id="card">
                  	<ul class="nav nav-sm flex-column">
				  		<li class="nav-item <?php if(route('admin.deposit.method')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.deposit.method')); ?>" class="nav-link"><?php echo e(__('Payment gateways')); ?></a></li>
						<li class="nav-item <?php if(route('admin.banktransfer')==url()->current()): ?> active <?php endif; ?>">
							<a href="<?php echo e(route('admin.banktransfer')); ?>" class="nav-link"><?php echo e(__('Bank transfer & logs')); ?>

								<?php if(count($pbank)>0): ?>
									<span class="badge badge-sm badge-circle badge-floating badge-danger border-white">
									<?php echo e(count($pbank)); ?>

									</span>
								<?php endif; ?>
							</a>
						</li>
						<li class="nav-item <?php if(route('admin.deposit.log')==url()->current()): ?> active <?php endif; ?>">
							<a href="<?php echo e(route('admin.deposit.log')); ?>" class="nav-link"><?php echo e(__('Deposit log')); ?>

								<?php if(count($pdeposit)>0): ?>
								<span class="badge badge-sm badge-circle badge-floating badge-danger border-white">
								<?php echo e(count($pdeposit)); ?>

								</span>
								<?php endif; ?>
				  			</a>
						</li>                          
                  </ul>
                </div>
			</li>  
			<li class="nav-item">
                <a class="nav-link <?php if(route('admin.withdraw.method')==url()->current() || route('admin.withdraw.log')==url()->current()): ?> show <?php endif; ?> text-dark" href="#xcard" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                  <i class="fa fa-calendar-check-o"></i>
                  	<span class="nav-link-text"><?php echo e(__('Payout')); ?>

						<?php if(count($pwithdraw)>0): ?>
							<span class="badge badge-sm badge-circle badge-floating badge-danger border-white">
							<?php echo e(count($pwithdraw)); ?>

							</span>
						<?php endif; ?>
					</span>
                </a>
                <div class="collapse <?php if(route('admin.withdraw.method')==url()->current() || route('admin.withdraw.log')==url()->current()): ?> show <?php endif; ?>" id="xcard">
                  	<ul class="nav nav-sm flex-column">
				  		<li class="nav-item <?php if(route('admin.withdraw.method')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.withdraw.method')); ?>" class="nav-link"><?php echo e(__('Payout types')); ?></a></li>
						<li class="nav-item <?php if(route('admin.withdraw.log')==url()->current()): ?> active <?php endif; ?>">
							<a href="<?php echo e(route('admin.withdraw.log')); ?>" class="nav-link"><?php echo e(__('Withdraw log')); ?>

								<?php if(count($pwithdraw)>0): ?>
									<span class="badge badge-sm badge-circle badge-floating badge-danger border-white">
									<?php echo e(count($pwithdraw)); ?>

									</span>
								<?php endif; ?>
							</a>
						</li>                       
                  	</ul>
                </div>
			</li>			
			<li class="nav-item">
                <a class="nav-link <?php if(route('admin.py.pending')==url()->current() || route('admin.py.completed')==url()->current() || route('admin.py.plans')==url()->current()|| route('admin.py.coupon')==url()->current()): ?> show <?php endif; ?> text-dark" href="#tcard" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                  <i class="fa fa-bar-chart-o"></i>
                  	<span class="nav-link-text"><?php echo e(__('Investment')); ?></span>
                </a>
                <div class="collapse <?php if(route('admin.py.pending')==url()->current() || route('admin.py.completed')==url()->current() || route('admin.py.plans')==url()->current()|| route('admin.py.coupon')==url()->current()): ?> show <?php endif; ?>" id="tcard">
                  	<ul class="nav nav-sm flex-column">
					 	<li class="nav-item <?php if(route('admin.py.pending')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.py.pending')); ?>" class="nav-link">Open Trades</a></li>
					 	<li class="nav-item <?php if(route('admin.py.completed')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.py.completed')); ?>" class="nav-link">Closed Trades</a></li>
						<li class="nav-item <?php if(route('admin.py.plans')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.py.plans')); ?>" class="nav-link">Plans</a></li>                    
						<li class="nav-item <?php if(route('admin.py.coupon')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.py.coupon')); ?>" class="nav-link">Coupon</a></li>                    
                  	</ul>
                </div>
			</li>			
			<li class="nav-item">
                <a class="nav-link <?php if(route('admin.transfers')==url()->current() || route('admin.referrals')==url()->current()): ?> show <?php endif; ?> text-dark" href="#trcard" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                  <i class="fa fa-send-o"></i>
                  	<span class="nav-link-text"><?php echo e(__('Transfer')); ?></span>
                </a>
                <div class="collapse <?php if(route('admin.transfers')==url()->current() || route('admin.referrals')==url()->current()): ?> show <?php endif; ?>" id="trcard">
                  	<ul class="nav nav-sm flex-column">
					 	<li class="nav-item <?php if(route('admin.transfers')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.transfers')); ?>" class="nav-link"><?php echo e(__('Transfer logs')); ?></a></li>
					 	<li class="nav-item <?php if(route('admin.referrals')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.referrals')); ?>" class="nav-link"><?php echo e(__('Referral earnings')); ?></a></li>
                  	</ul>
                </div>
			</li>       
          </ul>
          <hr class="my-3">
          <h6 class="navbar-heading p-0 text-muted"><?php echo e(__('More')); ?></h6>
          <ul class="navbar-nav mb-md-3"> 
		  	<li class="nav-item">
                <a class="nav-link <?php if(route('admin.blog')==url()->current() || route('admin.cat')==url()->current()): ?> show <?php endif; ?> text-dark" href="#brcard" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                  <i class="fa fa-newspaper-o"></i>
                  	<span class="nav-link-text"><?php echo e(__('Blog')); ?></span>
                </a>
                <div class="collapse <?php if(route('admin.blog')==url()->current() || route('admin.cat')==url()->current()): ?> show <?php endif; ?>" id="brcard">
                  	<ul class="nav nav-sm flex-column">
					 	<li class="nav-item <?php if(route('admin.blog')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.blog')); ?>" class="nav-link"><?php echo e(__('Articles')); ?></a></li>
					 	<li class="nav-item <?php if(route('admin.cat')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.cat')); ?>" class="nav-link"><?php echo e(__('Category')); ?></a></li>
                  	</ul>
                </div>
			</li> 
            <li class="nav-item">
              <a class="nav-link  <?php if(route('homepage')==url()->current() || route('admin.team')==url()->current() || route('admin.service')==url()->current() || route('admin.logo')==url()->current() || route('admin.review')==url()->current() || route('admin.page')==url()->current() || route('admin.faq')==url()->current() || route('admin.currency')==url()->current() || route('admin.terms')==url()->current() || route('privacy-policy')==url()->current() || route('about-us')==url()->current() || route('social-links')==url()->current()): ?> active <?php endif; ?> text-dark" href="#xx" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="fa fa-desktop"></i>
                <span class="nav-link-text"><?php echo e(__('Website design')); ?></span>
              </a>
              <div class="collapse <?php if(route('homepage')==url()->current() || route('admin.team')==url()->current() || route('admin.service')==url()->current() || route('admin.logo')==url()->current() || route('admin.review')==url()->current() || route('admin.page')==url()->current() || route('admin.faq')==url()->current() || route('admin.currency')==url()->current() || route('admin.terms')==url()->current() || route('privacy-policy')==url()->current() || route('about-us')==url()->current() || route('social-links')==url()->current()): ?> show <?php endif; ?>  text-dark" id="xx">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item <?php if(route('homepage')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('homepage')); ?>" class="nav-link"><?php echo e(__('Homepage')); ?></a></li>
                    <li class="nav-item <?php if(route('admin.logo')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.logo')); ?>" class="nav-link"><?php echo e(__('Logo & Favicon')); ?></a></li>	
                    <li class="nav-item <?php if(route('admin.review')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.review')); ?>"class="nav-link"><?php echo e(__('Platform Review')); ?></a></li>
					<li class="nav-item <?php if(route('admin.service')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.service')); ?>"class="nav-link">Services</a></li>
					<li class="nav-item <?php if(route('admin.team')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.team')); ?>"class="nav-link">Team</a></li>
                    <li class="nav-item <?php if(route('admin.page')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.page')); ?>" class="nav-link"><?php echo e(__('Webpages')); ?></a></li>
                    <li class="nav-item <?php if(route('admin.faq')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.faq')); ?>" class="nav-link"><?php echo e(__('FAQs')); ?></a></li>
                    <li class="nav-item <?php if(route('admin.currency')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.currency')); ?>" class="nav-link"><?php echo e(__('Currency')); ?></a></li>
                    <li class="nav-item <?php if(route('admin.terms')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.terms')); ?>" class="nav-link"><?php echo e(__('Terms & Condition')); ?></a></li>
                    <li class="nav-item <?php if(route('privacy-policy')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('privacy-policy')); ?>" class="nav-link"><?php echo e(__('Privacy policy')); ?></a></li>
                    <li class="nav-item <?php if(route('about-us')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('about-us')); ?>" class="nav-link"><?php echo e(__('About us')); ?></a></li>
                    <li class="nav-item <?php if(route('social-links')==url()->current()): ?> active <?php endif; ?>"><a href="<?php echo e(route('social-links')); ?>" class="nav-link"><?php echo e(__('Social Links')); ?></a></li>                           
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(route('admin.setting')==url()->current()): ?> active <?php endif; ?> text-dark" href="<?php echo e(route('admin.setting')); ?>">
                <i class="fa fa-cogs"></i>
                <span class="nav-link-text"><?php echo e(__('Settings')); ?></span>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('admin.logout')); ?>">
                <i class="fa fa-power-off"></i>
                <span class="nav-link-text"><?php echo e(__('Log out')); ?></span>
              </a>
            </li>            
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
            
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item">
              <a class="nav-link pr-0" href="javascript:void" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?php echo e(url('/')); ?>/asset/profile/person.jpg">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                      <span class="mb-0 text-sm text-default"><?php echo e(Auth::guard('admin')->user()->username); ?></span>
                    </div>
                </div>
              </a>
            </li> 
            <li class="nav-item">
              <a href="<?php echo e(route('admin.logout')); ?>" class="nav-link pr-0">
                <i class="ni ni-button-power text-danger"></i>
              </a>
            </li>             
          </ul>
        </div>
      </div>
    </nav>
    <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">

              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php echo $__env->yieldContent('content'); ?>
  </div>
</div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/chart.js/dist/Chart.extension.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/clipboard/dist/clipboard.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/select2/dist/js/select2.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/nouislider/distribute/nouislider.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/quill/dist/quill.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/dropzone/dist/min/dropzone.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/js/demo.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/js/sweetalert.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/tinymce/tinymce.min.js"></script>
	<script src="<?php echo e(url('/')); ?>/asset/tinymce/init-tinymce.js"></script>
</body>

</html>
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
<script type="text/javascript">
"use strict";
function exchange(){
	var percent = $("#percent").val();
	var duration = $("#duration").val();
	var period = $("#period").find(":selected").text();
	var myarr1 = period.split("-");
  	var dar1 = myarr1[1].split("<");	
	var compound = parseFloat(percent)*parseFloat(duration)*parseInt(dar1);
	var interest = compound-100;
  $("#compound").val(compound);
  $("#interest").val(interest);
}
  $("#percent").change(exchange);
  exchange();
  $("#duration").change(exchange);
  exchange();
  $("#period").change(exchange);
  exchange();
</script> 
<?php /**PATH C:\xampp\htdocs\hyip\resources\views/master.blade.php ENDPATH**/ ?>
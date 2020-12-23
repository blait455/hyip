

<?php $__env->startSection('content'); ?>
<div class="main-content">
    <!-- Header -->
    <div class="header py-7 py-lg-8 pt-lg-9" style="background-color: <?php echo e($set->m_c); ?>;">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-dark">
                <?php if(Auth::guard('user')->user()->status == 1 ): ?>
                  <?php echo e(__('Account has been blocked')); ?>

                <?php else: ?>
                  <?php echo e(__('Email verification')); ?>

                <?php endif; ?>
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5 mb-0">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">

          <div class="card card-profile bg-white border-0 mb-5">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <img src="<?php echo e(url('/')); ?>/asset/profile/<?php echo e($cast); ?>" class="rounded-circle border-secondary">
                </div>
              </div>
            </div>
            <div class="card-body pt-7 px-5">
              <div class="text-center text-dark mb-5">
                <small><?php echo e(__('Verify your Email')); ?>, <span class="text-muted"><a href="<?php echo e(route('user.send-emailVcode')); ?>"><?php echo e(__('Resend email')); ?></a></span></small>
              </div>
              <form role="form" action="<?php echo e(route('user.email-verify')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-future"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input type="hidden"  name="id" value="<?php echo e(Auth::guard('user')->user()->id); ?>">
                    <input class="form-control" placeholder="<?php echo e(__('Code')); ?>" type="text" name="email_code" required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-success my-4"><?php echo e(__('Verify')); ?></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('loginlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/toor/Documents/core/resources/views/user/profile/verify.blade.php ENDPATH**/ ?>
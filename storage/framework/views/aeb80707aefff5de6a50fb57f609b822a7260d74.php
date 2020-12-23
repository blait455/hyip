<?php $__env->startSection('content'); ?>
<section id="header" class="backg backg-one bg-banner-gradient">
  <div class="container">
      <div class="backg-content-wrap">
          <div class="row align-items-center">
              <div class="col-lg-6 z100">
                  <div class="backg-content">
                      <span class="discount wow soneFadeUp" data-wosw-delay="0.3s"><?php echo e(__('Create an account')); ?></span>
                      <h1 class="backg-title wow soneFadeUp" data-wow-delay="0.5s">
                      <?php echo e(__('Lets get to know you')); ?>

                      </h1>     
                      <span class="text-medium"><?php echo e(__('Need help?')); ?> <a href="mailto:<?php echo e($set->email); ?>"><?php echo e(__('contact support')); ?></a></span>             

                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="wow soneFadeLeft">
                    <div class="pt-100"></div>
                    <?php if($set->registration==1): ?>
                      <form action="<?php echo e(route('submitreferral')); ?>" method="post" class="contact-form" data-saasone="contact-froms">
                          <?php echo csrf_field(); ?>
                        <div class="row">
                          <div class="col-lg-6">
                            <input placeholder="First Name" type="text" name="first_name" required>
                          </div>                        
                          <div class="col-lg-6">
                            <input placeholder="Last Name" type="text" name="last_name" required>
                          </div>
                        </div>            
                        <input placeholder="Username" type="text" name="username" required>
                        <?php if($errors->has('username')): ?>
                          <span class="error form-error-msg ">
                              <?php echo e($errors->first('username')); ?>

                          </span>
                        <?php endif; ?>
                        <input type="email" name="email" placeholder="Email Address" required>
                        <?php if($errors->has('email')): ?>
                            <span class="error form-error-msg ">
                                <?php echo e($errors->first('email')); ?>

                            </span>
                        <?php endif; ?>
                        <input type="password" name="password" placeholder="Password" required>
                        <input value="<?php echo e($ref); ?>" type="hidden" name="ref">
                        <?php if($errors->has('password')): ?>
                            <span class="error form-error-msg ">
                                <?php echo e($errors->first('password')); ?>

                            </span>
                        <?php endif; ?>
                        <div class="text-left">
                          <a href="<?php echo e(route('login')); ?>"><span class="text-small"><?php echo e(__('Got an account?')); ?></span></a>
                        </div>                              
                        <div class="text-right">
                          <button type="submit" class="sone-btn"><?php echo e(__('Continue')); ?></button>
                        </div>
                      </form>
                    <?php else: ?>
                      <div class="text-dark text-center mt-2 mb-3"><strong><?php echo e(__('We are not currenctly accepting new users')); ?></strong></div>
                    <?php endif; ?>
                  </div>
                  <!-- /.promo-mockup -->
              </div>
              <!-- /.col-lg-6 -->
          </div>
          <!-- /.row -->
      </div>
      <!-- /.backg-content-wrap -->
  </div>
  <!-- /.container -->
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views//auth/referral.blade.php ENDPATH**/ ?>
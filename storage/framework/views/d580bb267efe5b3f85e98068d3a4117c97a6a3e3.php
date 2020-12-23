

<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-8">
        <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
          <div class="card-header">
            <h3 class="mb-0"><?php echo e(__('Your Profile')); ?></h3>
          </div>
          <div class="card-body">
            <form action="<?php echo e(url('user/account')); ?>" method="post">
              <?php echo csrf_field(); ?>
                <div class="form-group row">
                  <label class="col-form-label col-lg-3"><?php echo e(__('Full Name')); ?></label>
                  <div class="col-lg-9">
                    <div class="row">
                        <div class="col-6">
                          <input type="text" name="first_name" class="form-control" placeholder="<?php echo e(__('First Name')); ?>" value="<?php echo e($user->first_name); ?>">
                        </div>      
                        <div class="col-6">
                          <input type="text" name="last_name" class="form-control" placeholder="<?php echo e(__('Last Name')); ?>" value="<?php echo e($user->last_name); ?>">
                        </div>
                    </div>
                  </div>
                </div>  
                <div class="form-group row">
                  <label class="col-form-label col-lg-3"><?php echo e(__('Username')); ?></label>
                  <div class="col-lg-9">
                    <input type="text" name="business_name" class="form-control" placeholder="<?php echo e(__('Your Username')); ?>" value="<?php echo e($user->username); ?>" required>
                  </div>
                </div>   
                <div class="form-group row">
                  <label class="col-form-label col-lg-3"><?php echo e(__('Phone Number')); ?></label>
                  <div class="col-lg-9">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">+</span>
                      </div>
                      <input type="number" inputmode="numeric" name="phone" placeholder="<?php echo e(__('Phone Number')); ?>" maxlength="14" class="form-control" value="<?php echo e($user->phone); ?>">
                    </div>
                  </div>
                </div>                 
                <div class="form-group row">
                  <label class="col-form-label col-lg-3"><?php echo e(__('Email Address')); ?></label>
                  <div class="col-lg-9">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                      </div>
                      <input type="email" name="email" class="form-control" placeholder="<?php echo e(__('Email Address')); ?>" value="<?php echo e($user->email); ?>">
                    </div>
                  </div>
                </div>               
                <div class="form-group row">
                  <label class="col-form-label col-lg-3"><?php echo e(__('Address')); ?></label>
                  <div class="col-lg-9">
                    <input type="text" name="address" class="form-control" placeholder="<?php echo e(__('Address')); ?>" value="<?php echo e($user->address); ?>">
                  </div>
                </div>                      
                <div class="form-group row">
                  <label class="col-form-label-castro col-lg-2"><?php echo e(__('Password')); ?></label>
                  <div class="col-lg-10">
                    <a data-toggle="modal" data-target="#modal-formx" href="" class="btn btn-white btn-sm"><?php echo e(__('Change Password')); ?></a>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="custom-control custom-checkbox mb-3">
                        <input class="custom-control-input" name="trade_share" id="customCheck1" type="checkbox" <?php if($user->trade_share=="on"): ?> checked="" <?php endif; ?>>
                        <label class="custom-control-label" for="customCheck1"><?php echo e(__('Trading Earning being shared on Platform')); ?></label>
                      </div>
                    </div>
                  </div>                  
              <div class="text-right">
                <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Save Changes')); ?></button>
              </div>
            </form>
          </div>
        </div>
        
        <div class="card bg-white" id="2fa">
          <div class="card-body">
            <h3 class="mb-0"><?php echo e(__('Two-Factor Security Option')); ?></h3>
            <div class="align-item-sm-center flex-sm-nowrap text-left">
                <span class="form-text text-sm">
                <?php echo e(__('Two-factor authentication is a method for protection your web account. 
                  When it is activated you need to enter not only your password, but also a special code. 
                  You can receive this code by in mobile app. 
                  Even if third person will find your password, then cant access with that code.')); ?>

                </span>
                <span class="badge badge-pill badge-primary mb-3">
                  <?php if($user->fa_status==0): ?>
                  <?php echo e(__('Disabled')); ?>

                  <?php else: ?>
                  <?php echo e(__('Active')); ?>

                  <?php endif; ?>
                </span>
                <span class="form-text text-sm text-default">
                <?php echo e(__('1. Install an authentication app on your device. Any app that supports the Time-based One-Time Password (TOTP) protocol should work.')); ?>

                </span>
                <span class="form-text text-sm text-default">
                <?php echo e(__('2. Use the authenticator app to scan the barcode below.')); ?>

                </span>
                <span class="form-text text-sm text-default">
                <?php echo e(__('3. Enter the code generated by the authenticator app.')); ?>

                </span>
                <a data-toggle="modal" data-target="#modal-form2fa" href="" class="btn btn-success btn-sm">
                <?php if($user->fa_status==0): ?>
                  <?php echo e(__('Enable 2fa')); ?>

                <?php elseif($user->fa_status==1): ?>
                  <?php echo e(__('Disable 2fa')); ?>

                <?php endif; ?>
                </a>
                <div class="modal fade" id="modal-form2fa" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-body p-0">
                        <div class="card bg-white border-0 mb-0 text-center">
                          <div class="card-body px-lg-5 py-lg-5">
                          <?php if($user->fa_status==0): ?>
                            <img src="<?php echo e($image); ?>" class="mb-3 user-profile">
                          <?php endif; ?>
                            <form action="<?php echo e(route('change.2fa')); ?>" method="post">
                              <?php echo csrf_field(); ?>
                              <div class="form-group row">
                                <div class="col-lg-12">
                                  <input type="number" name="code" class="form-control" minlength="6" placeholder="Six digit code" required>
                                    <input type="hidden"  name="vv" value="<?php echo e($secret); ?>">
                                  <?php if($user->fa_status==0): ?>
                                    <input type="hidden"  name="type" value="1">
                                  <?php elseif($user->fa_status==1): ?>
                                    <input type="hidden"  name="type" value="0">
                                  <?php endif; ?>
                                </div>
                              </div>            
                              <div class="text-right">
                                <button type="submit" class="btn btn-success btn-sm">
                                <?php if($user->fa_status==0): ?>
                                  <?php echo e(__('Enable 2fa')); ?>

                                <?php elseif($user->fa_status==1): ?>
                                  <?php echo e(__('Disable 2fa')); ?>

                                <?php endif; ?>
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
          <div class="card-body text-center">
            <h3 class="card-title mb-3"><?php echo e(__('Account Photo')); ?></h3>
            <p class="card-text text-sm text-dark"><?php echo e(__('We recommend you use a square logo with dimensions 70px by 70px for best results on the checkout form.')); ?></p>
            <a href="#" class="avatar text-center mb-3">
              <img src="<?php echo e(url('/')); ?>/asset/profile/<?php echo e($cast); ?>"/>
            </a>
            <form action="<?php echo e(url('user/avatar')); ?>" enctype="multipart/form-data" method="post">
            <?php echo csrf_field(); ?>
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFileLang" name="image" accept="image/*" required>
                    <label class="custom-file-label" for="customFileLang" style="border-color: <?php echo e($set->s_c); ?>;"><?php echo e(__('Choose Media')); ?></label>
                  </div> 
                </div>              
              <div class="text-right">
                <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Change Photo')); ?></button>
              </div>
            </form>
          </div>
        </div>
        <?php if($set->kyc): ?>
          <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
            <div class="card-body text-center">
              <h3 class="card-title mb-3"><?php echo e(__('Identity verification')); ?></h3>
              <p class="card-text text-sm text-dark"><?php echo e(__('Upload an Identity Document, for example, Driver Licence, Voters Card, International Passport, National ID.')); ?></p>
                <?php if($user->kyc_status==1): ?>
                <span class="badge badge-pill badge-primary mb-3">
                <?php echo e(__('Under Review')); ?>

                </span>
                <?php elseif($user->kyc_status==2): ?>
                <span class="badge badge-pill badge-success mb-3">
                <?php echo e(__('Verified')); ?>

                </span>
                <?php endif; ?>
              <?php if(empty($user->kyc_link)): ?>
                  <form method="post" action="<?php echo e(url('user/kyc')); ?>" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                      <div class="form-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFileLang1" name="image" lang="en">
                          <label class="custom-file-label sdsd" for="customFileLang1" style="border-color: <?php echo e($set->s_c); ?>;"><?php echo e(__('Select document')); ?></label>
                        </div>
                      </div>
                    <div class="text-right">
                      <input type="submit" class="btn btn-success btn-sm" value="Upload">
                    </div>
                  </form>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
          <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
            <div class="card-body text-center">
              <h3 class="card-title mb-3"><?php echo e(__('Delete Account')); ?></h3>
              <p class="card-text text-sm text-dark"><?php echo e(__('Closing this account means you will no longer be able to access this account on')); ?> <?php echo e($set->site_name); ?></p>
              <div class="text-right">
                  <a data-toggle="modal" data-target="#modal-formp" href="" class="btn btn-neutral btn-sm"><i class="fa fa-trash"></i> <?php echo e(__('Delete Account')); ?></a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="modal fade" id="modal-formp" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
              <div class="modal-body p-0">
                <div class="card bg-white border-0 mb-0">
                  <div class="card-body px-lg-5 py-lg-5">
                    <form action="<?php echo e(route('delaccount')); ?>" method="post">
                      <?php echo csrf_field(); ?>
                      <div class="form-group row">
                        <div class="col-lg-12">
                          <textarea type="text" name="reason" class="form-control" rows="5" placeholder="<?php echo e(__('Sorry to see you leave, Please tell us why you are leaving')); ?>" required></textarea>
                        </div>
                      </div>             
                      <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Delete account')); ?></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>         
        <div class="modal fade" id="modal-formx" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
              <div class="modal-body p-0">
                <div class="card bg-white border-0 mb-0">
                  <div class="card-header header-elements-inline">
                    <h3 class="mb-0"><?php echo e(__('Change Password')); ?></h3>
                  </div>
                  <div class="card-body px-lg-5 py-lg-5">
                    <form action="<?php echo e(route('change.password')); ?>" method="post">
                      <?php echo csrf_field(); ?>
                      <div class="form-group row">
                        <label class="col-form-label col-lg-4"><?php echo e(__('New Password')); ?></label>
                        <div class="col-lg-8">
                          <input type="password" name="password" class="form-control" minlength="6" placeholder="<?php echo e(__('Your New Password')); ?>" required>
                        </div>
                      </div>             
                      <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Change Password')); ?></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/toor/Documents/core/resources/views/user/profile/index.blade.php ENDPATH**/ ?>
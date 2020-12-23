

<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="">
          <div class="card-body">
            <div class="">
              <a data-toggle="modal" data-target="#modal-formx" href="" class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i> <?php echo e(__('Withdraw request')); ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="modal fade" id="modal-formx" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body p-0">
                <div class="card border-0 mb-0">
                  <div class="card-header">
                    <h3 class="mb-0"><?php echo e(__('Withdraw Request')); ?></h3>
                  </div>
                  <div class="card-body">
                    <form action="<?php echo e(route('withdraw.submit')); ?>" method="post">
                      <?php echo csrf_field(); ?>
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2"><?php echo e(__('Amount')); ?></label>
                        <div class="col-lg-10">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><?php echo e($currency->symbol); ?></span>
                            </div>
                            <input type="number" step="any" name="amount" maxlength="10" class="form-control" required="">
                          </div>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2"><?php echo e(__('Type')); ?></label>
                        <div class="col-lg-10">
                          <select class="form-control select" name="type" required>
                            <option value="1"><?php echo e(__('Trading profit')); ?></option>
                            <option value="2"><?php echo e(__('Account balance')); ?></option>
                            <option value="3"><?php echo e(__('Referral earnings')); ?></option>
                          </select>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2"><?php echo e(__('Method')); ?></label>
                        <div class="col-lg-10">
                          <select class="form-control select" name="coin" data-dropdown-css-class="bg-primary" data-fouc required>
                          <?php $__currentLoopData = $method; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value='<?php echo e($val->id); ?>'><?php echo e($val->method); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2"><?php echo e(__('Details')); ?></label>
                        <div class="col-lg-10">
                        <textarea type="text" name="details" rows="10" class="form-control" required=""></textarea>
                        </div>
                      </div>                
                      <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Save')); ?></button>
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
    <div class="row">
      <div class="col-md-8">
        <div class="row"> 
          <?php if(count($withdraw)>0): ?>
            <?php $__currentLoopData = $withdraw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-6">
                <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-8">
                        <!-- Title -->
                        <h4 class="mb-0 text-dark">#<?php echo e($val->reference); ?></h4>
                      </div>
                      <div class="col-4 text-right">
                        <?php if($val->status==0): ?>
                          <a data-toggle="modal" data-target="#modal-forma<?php echo e($val->id); ?>" href="" class="btn btn-sm btn-success"><?php echo e(__('Update')); ?></a>
                        <?php endif; ?>
                      </div>
                      <div class="col">
                        <p class="text-sm text-dark mb-0"><?php echo e(__('Amount')); ?>: <?php echo e($currency->symbol); ?><?php echo e(number_format($val->amount)); ?></p>
                        <p class="text-sm text-dark mb-0"><?php echo e(__('Charge')); ?>: <?php echo e($currency->symbol.number_format($val->charge)); ?></p>
                        <p class="text-sm text-dark mb-0"><?php echo e(__('Method')); ?>: <?php echo e($val->wallet['method']); ?></p>
                        <p class="text-sm text-dark mb-0"><?php echo e(__('Details')); ?>: <?php echo e($val->details); ?></p>
                        <p class="text-sm text-dark mb-0"><?php echo e(__('Status')); ?>: <?php if($val->status==1): ?><?php echo e(__('Paid Out')); ?> <?php else: ?> <?php echo e(__('Pending')); ?> <?php endif; ?></p>
                        <p class="text-sm text-dark mb-0"><?php echo e(__('Type')); ?>: <?php if($val->type==1): ?> <?php echo e(__('Trading profit')); ?> <?php elseif($val->type==2): ?> <?php echo e(__('Account balance')); ?> <?php elseif($val->type==3): ?> <?php echo e(__('Referral bonus')); ?> <?php endif; ?></p>
                        <p class="text-sm text-dark mb-0"><?php echo e(__('Created')); ?>: <?php echo e(date("Y/m/d h:i:A", strtotime($val->created_at))); ?></p>
                        <p class="text-sm text-dark mb-0"><?php echo e(__('Updated')); ?>: <?php echo e(date("Y/m/d h:i:A", strtotime($val->updated_at))); ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
              <div class="modal fade" id="modal-forma<?php echo e($val->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-body p-0">
                      <div class="card border-0 mb-0">
                        <div class="card-header">
                          <h3 class="mb-0"><?php echo e(__('Withdraw Request')); ?></h3>
                        </div>
                        <div class="card-body">
                          <form action="<?php echo e(url('user/withdraw-update')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                              <label class="col-form-label col-lg-2"><?php echo e(__('Method')); ?></label>
                              <div class="col-lg-10">
                                <select class="form-control select" name="coin" data-fouc>
                                <?php $__currentLoopData = $method; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value='<?php echo e($valx->id); ?>'
                                    <?php if($valx->id==$val->wallet->id): ?>
                                    <?php echo e(__('selected')); ?>

                                    <?php endif; ?>
                                    ><?php echo e($valx->method); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-form-label col-lg-2"><?php echo e(__('Details')); ?></label>
                              <div class="col-lg-10">
                                <textarea name="details" class="form-control" rows="4"><?php echo e($val->details); ?></textarea>
                                <input name="withdraw_id" type="hidden" value="<?php echo e($val->id); ?>">
                              </div>
                            </div>                
                            <div class="text-right">
                              <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Save')); ?></button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
          <div class="col-md-12">
            <p class="text-center text-muted card-text mt-8">No Withdrawal Request Found</p>
          </div>
          <?php endif; ?>
        </div>
        <div class="row">
          <div class="col-md-12">
          <?php echo e($withdraw->links()); ?>

          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col text-center">
                <h4 class="mb-4" style="color: <?php echo e($set->s_c); ?>;">
                <?php echo e(__('Statistics')); ?>

                </h4>
                <span class="text-sm text-dark mb-0"><i class="fa fa-google-wallet"></i> <?php echo e(__('Received')); ?></span><br>
                <span class="text-xl text-dark mb-0"><?php echo e($currency->name); ?> <?php echo e(number_format($received)); ?>.00</span><br>
                <hr>
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col">
                <div class="my-4">
                  <span class="surtitle"><?php echo e(__('Pending')); ?></span><br>
                  <span class="surtitle "><?php echo e(__('Total')); ?></span>
                </div>
              </div>
              <div class="col-auto">
                <div class="my-4">
                  <span class="surtitle "><?php echo e($currency->name); ?> <?php echo e(number_format($pending)); ?>.00</span><br>
                  <span class="surtitle" style="color: <?php echo e($set->s_c); ?>;"><?php echo e($currency->name); ?> <?php echo e(number_format($total)); ?>.00</span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/user/profile/withdraw.blade.php ENDPATH**/ ?>
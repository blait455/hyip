<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="">
          <div class="card-body">
            <div class="">
              <a data-toggle="modal" data-target="#modal-formx" href="" class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i> <?php echo e(__('Send money')); ?></a>
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
                    <h3 class="mb-0"><?php echo e(__('Transfer money')); ?></h3>
                    <span class="form-text text-sm text-dark"><?php echo e(__('Transfer charge is')); ?> <?php echo e($set->transfer_charge); ?>% <?php echo e(__('per transaction, If user is not a member of')); ?> <?php echo e($set->site_name); ?>, <?php echo e(__('registration will be required to claim money. Money will be refunded within 5 days if user does not claim money.')); ?></span>
                  </div>
                  <div class="card-body">
                    <form action="<?php echo e(route('submit.ownbank')); ?>" method="post" id="modal-details">
                      <?php echo csrf_field(); ?>
                        <div class="form-group row">
                          <label class="col-form-label col-lg-2"><?php echo e(__('Email')); ?></label>
                          <div class="col-lg-10">
                              <input type="email" name="email" class="form-control" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-lg-2"><?php echo e(__('Amount')); ?></label>
                          <div class="col-lg-10">
                            <div class="input-group">
                              <span class="input-group-prepend">
                                <span class="input-group-text"><?php echo e($currency->symbol); ?></span>
                              </span>
                              <input type="number" class="form-control" name="amount" id="amount" required>
                              <span class="input-group-append">
                                <span class="input-group-text">.00</span>
                              </span>
                            </div>
                          </div>
                        </div>                   
                        <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm" form="modal-details"><?php echo e(__('Transfer money')); ?></button>
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
          <?php if(count($transfer)>0): ?>
            <?php $__currentLoopData = $transfer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-6">
              <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-8">
                        <!-- Title -->
                        <h5 class="h4 mb-0 text-dark">#<?php echo e($val->ref_id); ?></h5>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col">
                          <p class="text-sm text-dark mb-0"><?php echo e(__('Amount')); ?>: <?php echo e($currency->symbol.number_format($val->amount)); ?></p>
                          <p class="text-sm text-dark mb-0"><?php echo e(__('Charge')); ?>: <?php echo e($currency->symbol.number_format($val->charge)); ?></p>
                          <?php if($val->receiver['email']!=null): ?>
                          <p class="text-sm text-dark mb-0"><?php echo e(__('Email')); ?>: <?php echo e($val->receiver['email']); ?></p>
                          <?php else: ?>
                          <p class="text-sm text-dark mb-0"><?php echo e(__('Email')); ?>: <?php echo e($val->temp); ?></p>
                          <?php endif; ?>
                          <p class="text-sm text-dark mb-0"><?php echo e(__('Status')); ?>: <?php if($val->status==1): ?>Confirmed <?php elseif($val->status==0): ?>Pending <?php elseif($val->status==2): ?>Returned <?php endif; ?></p>
                          <p class="text-sm text-dark mb-0"><?php echo e(__('Created')); ?>: <?php echo e(date("Y/m/d h:i:A", strtotime($val->created_at))); ?></p>
                          <p class="text-sm text-dark mb-0"><?php echo e(__('Updated')); ?>: <?php echo e(date("Y/m/d h:i:A", strtotime($val->updated_at))); ?></p>
                        </div>
                      </div>
                  </div>
                </div>
              </div> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
            <div class="col-md-12">
              <p class="text-center text-muted card-text mt-8">No Transfer Request found</p>
            </div>
          <?php endif; ?>
        </div> 
        <div class="row">
          <div class="col-md-12">
          <?php echo e($transfer->links()); ?>

          </div>
        </div>
      </div> 
      <div class="col-md-4">
        <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col text-center">
                <h4 class="mb-4" style="color:<?php echo e($set->s_c); ?>;">
                <?php echo e(__('Statistics')); ?>

                </h4>
                <span class="text-sm text-dark mb-0"><i class="fa fa-google-wallet"></i> <?php echo e(__('Sent')); ?></span><br>
                <span class="text-xl text-dark mb-0"><?php echo e($currency->name); ?> <?php echo e(number_format($sent)); ?>.00</span><br>
                <hr>
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col">
                <div class="my-4">
                  <span class="surtitle"><?php echo e(__('Pending')); ?></span><br>
                  <span class="surtitle"><?php echo e(__('Returned')); ?></span><br>
                  <span class="surtitle "><?php echo e(__('Total')); ?></span>
                </div>
              </div>
              <div class="col-auto">
                <div class="my-4">
                  <span class="surtitle "><?php echo e($currency->name); ?> <?php echo e(number_format($pending)); ?>.00</span><br>
                  <span class="surtitle "><?php echo e($currency->name); ?> <?php echo e(number_format($rebursed)); ?>.00</span><br>
                  <span class="surtitle" style="color:<?php echo e($set->s_c); ?>;"><?php echo e($currency->name); ?> <?php echo e(number_format($total)); ?>.00</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php $__currentLoopData = $received; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col-8">
                  <h5 class="h4 mb-0 text-dark">#<?php echo e($val->ref_id); ?></h5>
                </div>
                <div class="col-4 text-right">
                  <?php if($val->status==0): ?>
                  <a href="<?php echo e(url('/')); ?>/user/received/<?php echo e($val->id); ?>" class="btn btn-sm btn-success" title="Mark as received"><i class="fa fa-check"></i> <?php echo e(__('Confirm')); ?></a>
                  <?php endif; ?>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <p class="text-sm text-dark mb-0"><?php echo e(__('Email')); ?>: <?php echo e($val->sender['email']); ?></p>
                  <p class="text-sm text-dark mb-0"><?php echo e(__('Total')); ?>: <?php echo e($currency->symbol.number_format($val->amount)); ?></p>
                  <p class="text-sm text-dark mb-0"><?php echo e(__('Date')); ?>: <?php echo e(date("h:i:A j, M Y", strtotime($val->created_at))); ?></p>
                  <?php if($val->status==1): ?>
                    <span class="badge badge-pill badge-success"><i class="fa fa-check"></i> <?php echo e(__('Received')); ?></span>
                  <?php elseif($val->status==0): ?>
                    <span class="badge badge-pill badge-danger"><i class="fa fa-spinner"></i> <?php echo e(__('Pending')); ?></span>                       
                  <?php elseif($val->status==2): ?>
                    <span class="badge badge-pill badge-info"><i class="fa fa-spinner"></i> <?php echo e(__('Returned')); ?></span>                    
                  <?php endif; ?>

                </div>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/user/transfer/index.blade.php ENDPATH**/ ?>
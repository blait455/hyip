<?php $__env->startSection('content'); ?>
    <div class="content"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold"><?php echo e(__('Edit')); ?></h6>
                    </div>
                    <div class="card-body">
                        <p class="text-danger"></p>
                        <form action="<?php echo e(route('admin.plan.update')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Name:')); ?></label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control" value="<?php echo e($plan->name); ?>" reqiured>
                                    <input type="hidden" name="id" value="<?php echo e($plan->id); ?>">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Daily percent:')); ?></label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="percent" value="<?php echo e($plan->percent); ?>" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>                             
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Minimum amount:')); ?></label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="min_amount" value="<?php echo e($plan->min_deposit); ?>" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text"><?php echo e($currency->name); ?></span>
                                        </span>
                                    </div>
                                </div>
                            </div>                             
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Maximum amount:')); ?></label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="max_amount" value="<?php echo e($plan->amount); ?>" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text"><?php echo e($currency->name); ?></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Duration:')); ?></label>
                                <div class="col-lg-10">
                                    <input type="number" name="duration" pattern="[0-9]+(\.[0-9]{0,2})?%?" value="<?php echo e($plan->duration); ?>" class="form-control" placeholder="1" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Period:')); ?></label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="period" data-fouc required>    
                                        <option value="Day" 
                                            <?php if($plan->period=='Day'): ?>
                                            <?php echo e(__('selected')); ?>

                                            <?php endif; ?>
                                            ><?php echo e(__('Day')); ?>

                                        </option>                                         
                                        <option value="Week" 
                                            <?php if($plan->period=='Week'): ?>
                                            <?php echo e(__('selected')); ?>

                                            <?php endif; ?>
                                            ><?php echo e(__('Week')); ?>

                                        </option>                                         
                                        <option value="Month" 
                                            <?php if($plan->period=='Month'): ?>
                                            <?php echo e(__('selected')); ?>

                                            <?php endif; ?>
                                            ><?php echo e(__('Month')); ?>

                                        </option>                                         
                                        <option value="Year" 
                                            <?php if($plan->period=='Year'): ?>
                                            <?php echo e(__('selected')); ?>

                                            <?php endif; ?>
                                            ><?php echo e(__('Year')); ?>

                                        </option>                                       
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Referral percent:')); ?></label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="ref_percent" maxlength="10" placeholder="2.5" value="<?php echo e($plan->ref_percent); ?>" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>                             
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Trading Bonus:')); ?></label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="bonus" maxlength="10" placeholder="2.5" value="<?php echo e($plan->bonus); ?>" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Status:')); ?></label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="status">
                                        <option value="1" 
                                            <?php if($plan->status==1): ?>
                                            <?php echo e(__('selected')); ?>

                                            <?php endif; ?>
                                            ><?php echo e(__('Active')); ?>

                                        </option>
                                        <option value="0"  
                                            <?php if($plan->status==0): ?>
                                            <?php echo e(__('selected')); ?>

                                            <?php endif; ?>
                                            ><?php echo e(__('Deactive')); ?>

                                        </option>
                                    </select>
                                </div>
                            </div>         
                            <div class="text-right">
                                <button type="submit" class="btn btn-success"><?php echo e(__('Save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/py-scheme/edit.blade.php ENDPATH**/ ?>
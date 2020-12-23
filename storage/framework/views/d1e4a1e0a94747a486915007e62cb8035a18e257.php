<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold"><?php echo e(__('Coupons')); ?></h6>
                            <div class="header-elements">
                                <a class="font-weight-semibold" data-toggle="modal" data-target="#create"><i class="icon-file-plus mr-2"></i><?php echo e(__('Create')); ?></a>
                            </div>
                    </div>
                    <div class="">
                        <table class="table datatable-responsive">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('S/N')); ?></th>
                                    <th><?php echo e(__('Code')); ?></th>
                                    <th><?php echo e(__('Percent Off')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>                                                                       
                                    <th><?php echo e(__('Created')); ?></th>
                                    <th><?php echo e(__('Updated')); ?></th>
                                    <th class="text-center"><?php echo e(__('Action')); ?></th>    
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $profit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$k); ?>.</td>
                                    <td class="text-uppercase"><?php echo e($val->code); ?></td>
                                    <td><?php echo e($val->percent); ?>%</td>
                                    <td>
                                        <?php if($val->status==0): ?>
                                        <?php echo e(__('Disabled')); ?>

                                        <?php elseif($val->status==1): ?>
                                        <?php echo e(__('Active ')); ?>

                                        <?php endif; ?>
                                    </td>  
                                    <td><?php echo e(date("Y/m/d h:i:A", strtotime($val->created_at))); ?></td>  
                                    <td><?php echo e(date("Y/m/d h:i:A", strtotime($val->updated_at))); ?></td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <?php if($val->status==1): ?>
                                                        <a class='dropdown-item' href="<?php echo e(url('/')); ?>/admin/uncoupon/<?php echo e($val->id); ?>"><i class="icon-eye-blocked2 mr-2"></i><?php echo e(__('Disable')); ?></a>
                                                    <?php else: ?>
                                                        <a class='dropdown-item' href="<?php echo e(url('/')); ?>/admin/pcoupon/<?php echo e($val->id); ?>"><i class="icon-eye mr-2"></i><?php echo e(__('Activate')); ?></a>
                                                    <?php endif; ?>
                                                    <a data-toggle="modal" data-target="#<?php echo e($val->id); ?>update" class="dropdown-item"><i class="icon-pencil7 mr-2"></i><?php echo e(__('Edit')); ?></a>
                                                    <a data-toggle="modal" data-target="#<?php echo e($val->id); ?>delete" class="dropdown-item"><i class="icon-bin2 mr-2"></i><?php echo e(__('Delete')); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>                   
                                </tr>
                                <div id="<?php echo e($val->id); ?>delete" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">   
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <h6 class="font-weight-semibold"><?php echo e(__('Are you sure you want to delete this?')); ?></h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                                <a  href="<?php echo e(url('/')); ?>/admin/py-coupon/delete/<?php echo e($val->id); ?>" class="btn bg-danger"><?php echo e(__('Proceed')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="<?php echo e($val->id); ?>update" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">   
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="<?php echo e(url('admin/py-coupon-edit')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-2"><?php echo e(__('Code')); ?>:</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" name="code" class="form-control" maxlength="8" value="<?php echo e($val->code); ?>">
                                                            <input type="hidden" name="id" value="<?php echo e($val->id); ?>">
                                                        </div>
                                                    </div>                                                      
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-2"><?php echo e(__('Percent')); ?>:</label>
                                                        <div class="col-lg-10">
                                                            <input type="number" name="percent" class="form-control" min="1" max="99" value="<?php echo e($val->percent); ?>">
                                                        </div>
                                                    </div>              
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                                    <button type="submit" class="btn bg-dark"><?php echo e(__('Update')); ?><i class="icon-paperplane ml-2"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>               
                            </tbody>                    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="create" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">   
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?php echo e(url('admin/py-coupon-create')); ?>" method="post">
                <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2"><?php echo e(__('Code')); ?>:</label>
                            <div class="col-lg-10">
                                <input type="text" name="code" class="form-control" maxlength="8" required>
                            </div>
                        </div>                                                      
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2"><?php echo e(__('Percent')); ?>:</label>
                            <div class="col-lg-10">
                                <input type="number" name="percent" class="form-control" min="1" max="99" required>
                            </div>
                        </div>           
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn bg-dark"><?php echo e(__('Submit')); ?><i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/py-scheme/coupon.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                <div class="card-body">
                    <a data-toggle="modal" data-target="#create" href="" class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i> <?php echo e(__('Create Coupon')); ?></a>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('Coupons')); ?></h3>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-buttons">
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
                                        <div class="text-right">
                                            <div class="dropdown">
                                                <a class="text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a data-toggle="modal" data-target="#delete<?php echo e($val->id); ?>" href="" class="dropdown-item"><?php echo e(__('Delete')); ?></a>
                                                    <a data-toggle="modal" data-target="#update<?php echo e($val->id); ?>" href="" class="dropdown-item"><?php echo e(__('Edit')); ?></a>
                                                    <?php if($val->status==1): ?>
                                                        <a class='dropdown-item' href="<?php echo e(route('coupon.unpublish', ['id' => $val->id])); ?>"><?php echo e(__('Disable')); ?></a>
                                                    <?php else: ?>
                                                        <a class='dropdown-item' href="<?php echo e(route('coupon.publish', ['id' => $val->id])); ?>"><?php echo e(__('Enable')); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </td>                   
                                </tr>
                                <div class="modal fade" id="delete<?php echo e($val->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card bg-white border-0 mb-0">
                                                    <div class="card-header">
                                                        <h3 class="mb-0"><?php echo e(__('Are you sure you want to delete this?')); ?></h3>
                                                    </div>
                                                    <div class="card-body px-lg-5 py-lg-5 text-right">
                                                        <button type="button" class="btn btn-neutral btn-sm" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                                        <a  href="<?php echo e(route('py.coupon.delete', ['id' => $val->id])); ?>" class="btn btn-danger btn-sm"><?php echo e(__('Proceed')); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div id="update<?php echo e($val->id); ?>" class="modal fade" tabindex="-1">
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
                                                    <button type="button" class="btn btn-neutral btn-sm" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                                    <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Submit')); ?></button>
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
                    <button type="button" class="btn btn-neutral btn-sm" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Submit')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/investment/coupon.blade.php ENDPATH**/ ?>
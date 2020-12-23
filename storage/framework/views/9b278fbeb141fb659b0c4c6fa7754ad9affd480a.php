<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0"><?php echo e(__('Social links')); ?></h3>
            </div>
            <table class="table datatable-show-all">
                <thead>
                    <tr>
                        <th><?php echo e(__('S/N')); ?></th>
                        <th><?php echo e(__('Name')); ?></th>
                        <th><?php echo e(__('Link')); ?></th>
                        <th class="scope"></th>    
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$k); ?>.</td>
                        <td><?php echo e($val->type); ?></td>
                        <td><?php echo e($val->value); ?></td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class='dropdown-item' data-toggle="modal" data-target="#update<?php echo e($val->id); ?>" href=""><?php echo e(__('Edit')); ?></a>
                                </div>
                            </div>
                        </td>                   
                    </tr>                              
                    <div id="update<?php echo e($val->id); ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card bg-white border-0 mb-0">
                                    <div class="card-body px-lg-5 py-lg-5">
                                        <form action="<?php echo e(route('social-links.update')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <input type="url" name="link" class="form-control" placeholder="link" value="<?php echo e($val->value); ?>">
                                                <input type="hidden" name="id" value="<?php echo e($val->id); ?>">
                                            </div>
                                        </div>             
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Update')); ?></button>
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>               
                </tbody>                    
            </table>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/web-control/social-links.blade.php ENDPATH**/ ?>
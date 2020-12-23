    <?php $__env->startSection('content'); ?>
        <div class="container-fluid mt--6">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                        <div class="card-body">
                        <a href="<?php echo e(route('blog.create')); ?>" class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i> <?php echo e(__('Create Article')); ?></a>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo e(__('Posts')); ?></h3>
                            </div>
                            <div class="table-responsive py-4">
                                <table class="table table-flush" id="datatable-buttons">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('S/N')); ?></th>
                                            <th><?php echo e(__('Title')); ?></th>
                                            <th><?php echo e(__('Category')); ?></th>
                                            <th><?php echo e(__('Views')); ?></th>
                                            <th><?php echo e(__('Status')); ?></th>
                                            <th><?php echo e(__('Created')); ?></th>
                                            <th><?php echo e(__('Updated')); ?></th>
                                            <th class="text-center"><?php echo e(__('Action')); ?></th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$k); ?>.</td>                                   
                                            <td><?php echo e($val->title); ?></td>
                                            <td><?php echo e($val->category['categories']); ?></td>
                                            <td><?php echo e($val->views); ?></td>
                                            <td>
                                                <?php if($val->status==1): ?>
                                                    <span class="badge badge-success"><?php echo e(__('Published')); ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger"><?php echo e(__('Pending')); ?></span>
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
                                                            <?php if($val->status==1): ?>
                                                                <a class='dropdown-item' href="<?php echo e(route('blog.unpublish', ['id' => $val->id])); ?>"><?php echo e(__('Unpublish')); ?></a>
                                                            <?php else: ?>
                                                                <a class='dropdown-item' href="<?php echo e(route('blog.publish', ['id' => $val->id])); ?>"><?php echo e(__('Publish')); ?></a>
                                                            <?php endif; ?>
                                                            <a href="<?php echo e(route('blog.edit', ['id' => $val->id])); ?>" class="dropdown-item"><?php echo e(__('Edit')); ?></a>
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
                                                                <a  href="<?php echo e(route('blog.delete', ['id' => $val->id])); ?>" class="btn btn-danger btn-sm"><?php echo e(__('Proceed')); ?></a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/blog/index.blade.php ENDPATH**/ ?>
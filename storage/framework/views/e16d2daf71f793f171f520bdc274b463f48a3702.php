<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?php echo e(__('Compose article')); ?></h3>
          </div>
          <div class="card-body">
            <p class="text-danger"></p>
            <form action="<?php echo e(route('blog.create')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2"><?php echo e(__('Title')); ?></label>
                    <div class="col-lg-10">
                        <input type="text" name="title" class="form-control" reqiured>
                    </div>
                    <?php if($errors->has('title')): ?>
                        <div class="error"><?php echo e($errors->first('title')); ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2"><?php echo e(__('Category')); ?></label>
                    <div class="col-lg-10">
                        <select class="form-control select" name="cat_id" data-dropdown-css-class="bg-info-800" data-fouc required> 
                        <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value='<?php echo e($val->id); ?>'><?php echo e($val->categories); ?></option>     
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
                        </select>
                        <?php if($errors->has('cat_id')): ?>
                            <div class="error"><?php echo e($errors->first('cat_id')); ?></div>
                        <?php endif; ?>
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-form-label col-lg-2"><?php echo e(__('Thumbnail')); ?>:</label>
                    <div class="col-lg-10">
                        <input type="file" class="custom-file-input" id="customFileLang" name="image" lang="en">
                        <label class="custom-file-label" for="customFileLang" style="border-color: <?php echo e($set->s_c); ?>;"><?php echo e(__('Choose Media')); ?></label>
                    </div>
                </div>                
                <div class="form-group row">
                    <label class="col-form-label col-lg-2"><?php echo e(__('Content')); ?></label>
                    <div class="col-lg-10">
                        <textarea type="text" name="details"  class="tinymce form-control"></textarea>
                    </div>
                </div>           
                <div class="text-right">
                    <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Save')); ?></button>
                </div>
            </form>
        </div>
    </div> 
</div> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/blog/add.blade.php ENDPATH**/ ?>
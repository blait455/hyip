<div class="col-lg-4 col-md-6 col-sm-8 right-blog-d">
    <div class="sidebar">
        <div id="gp-posts-widget-2" class="widget gp-posts-widget">
            <h2 class="widget-title"><?php echo e(__('Latest Posts')); ?></h2>
            <div class="gp-posts-widget-wrapper">
            <?php $__currentLoopData = $trending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vtrending): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $vslug=str_slug($vtrending->title); ?>
                <div class="post-item">
                    <div class="post-widget-thumbnail"><a href="<?php echo e(url('/')); ?>/single/<?php echo e($vtrending->id); ?>/<?php echo e($vslug); ?>"><img src="<?php echo e(url('/')); ?>/asset/thumbnails/<?php echo e($vtrending->image); ?>" alt="thumb"></a></div>
                    <div class="post-widget-info">
                        <span class="post-widget-title"><a href="<?php echo e(url('/')); ?>/single/<?php echo e($vtrending->id); ?>/<?php echo e($vslug); ?>" title="<?php echo e($vtrending->title); ?>"><?php echo e($vtrending->title); ?></a></span></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div id="categories" class="widget widget_categories">
            <h2 class="widget-title"><?php echo e(__('Categories')); ?></h2>
            <ul>
            <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                <?php
                    $rate=count(App\Models\Blog::wherecat_id($vcat->id)->wherestatus(1)->get());
                ?> 
                <li><a href="<?php echo e(url('/')); ?>/cat/<?php echo e($vcat->id); ?>/<?php echo e(str_slug($vcat->categories)); ?>"><?php echo e($vcat->categories); ?><span class="count">(<?php echo e($rate); ?>)</span></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/partials/sidebar.blade.php ENDPATH**/ ?>
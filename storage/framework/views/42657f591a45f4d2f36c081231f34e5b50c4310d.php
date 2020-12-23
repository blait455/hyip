 <?php $slug  = str_slug($post->title); ?>
<ul class="share-link flex-center">
    <li><a class="facebook " href="https://www.facebook.com/sharer.php?u=<?php echo e(url('/')); ?>/single/<?php echo e($post->id); ?>/<?php echo e($slug); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
    <li><a class="twitter " href="https://twitter.com/intent/tweet?url=<?php echo e(url('/')); ?>/single/<?php echo e($post->id); ?>/<?php echo e($slug); ?>&text=<?php echo e($post->title); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
    <li><a class="google " href="https://plus.google.com/share?url=<?php echo e(url('/')); ?>/single/<?php echo e($post->id); ?>/<?php echo e($slug); ?>&text=<?php echo e($post->title); ?>&hl=english" target="_blank"><i class="fa fa-google-plus"></i></a></li>
    <li><a class="pinterest " href="https://pinterest.com/pin/create/button/?url=<?php echo e(url('/')); ?>/single/<?php echo e($post->id); ?>/<?php echo e($slug); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
</ul><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/partials/share.blade.php ENDPATH**/ ?>
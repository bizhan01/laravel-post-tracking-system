<?php if(auth()->user()->isAdmin == 1 && auth()->user()->status == 1): ?>
	<?php echo $__env->make('admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif(auth()->user()->isAdmin == 2 && auth()->user()->status == 1): ?>
	<?php echo $__env->make('manager', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
  <?php echo $__env->make('blocked', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

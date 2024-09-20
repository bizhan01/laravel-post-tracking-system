<?php $__env->startSection('content'); ?>
<div style="height: 113px;"></div>
<div class="site-blocks-cover overlay inner-page" style="background-image: url('/website/images/IMG-20210727-WA0005.jpg'); height: 450px" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-10 text-center" data-aos="fade">
        <br></br>
        <br></br>
         <?php if(isset($details)): ?>
         <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p class="h2  mb-10" style="background-color: green; color: white; padding: 80px;">
          مشتری گرامی<br>
          <?php if($order->status == 1): ?>
            پست شما در حال آماده شدن است
           <?php elseif($order->status == 2): ?>
            پست شما از مبدا به مقصد ارسال شده است
           <?php elseif($order->status == 3): ?>
             پست شما آماده تحویل میباشد
            <?php elseif($order->status == 4): ?>
            پست شما تحویل داده شده است
           <?php else: ?>
          <?php endif; ?>
        </p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
          <p class="h2  mb-10" style="background-color: #f70c17; color: white; padding: 60px; direction: rlt"><?php echo e($message); ?>

            مشتری گرامی<br>
            کد سفارش شما در سیستم ثبت نمی باشد<br>
          لطفا بصورت صحیح کد را وارد کنید
          </p>
        <?php endif; ?>
        <p><a href="<?php echo e(route('contactUs')); ?>" class="btn btn-outline-warning py-3 px-4">تماس باما</a> <a href="<?php echo e(route('welcome')); ?>" class="btn btn-warning py-3 px-4">برگشت</a></p>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.masterLayouts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
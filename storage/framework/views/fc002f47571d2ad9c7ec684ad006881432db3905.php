<?php $__env->startSection('content'); ?>
<div style="height: 113px;"></div>
<div class="unit-5 overlay" style="background-image: url('/website/images/Screenshot_2021-12-14-13-28-53.png');" style="height: 400px">
    <div class="container text-center">
      <h2 class="mb-0">خدمات ما</h2>
      <p class="mb-0 unit-6"><a href="index.html">خانه</a> <span class="sep">></span> <span>خدمات ما</span></p>
    </div>
  </div>


  <div class="site-section" dir="rtl">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center mb-5 section-heading">
          <h2 class="mb-5">عمده ترین خدمات ما</h2>
        </div>
      </div>
      <div class="row">
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
          <a href="serviceDetails/<?php echo e($service->id); ?>" class="h-100 feature-item">
            <span class="d-block icon  mb-3 text-primary"><img src="/uploadedImages/services/<?php echo e($service->photo); ?>" alt="" style="height: 100px"/></span>
            <h2><?php echo e($service->title); ?></h2>
            <span class="counting">جزئیات</span>
          </a>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.masterLayouts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
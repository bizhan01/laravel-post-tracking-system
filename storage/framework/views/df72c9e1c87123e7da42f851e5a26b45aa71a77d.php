<?php $__env->startSection('content'); ?>
  <div style="height: 113px;"></div>
<div class="unit-5 overlay" style="background-image: url('/website/images/FB_IMG_1639472094682.jpg');">
    <div class="container text-center">
      <h2 class="mb-0">درباره ما</h2>
      <p class="mb-0 unit-6"><a href="index.html">خانه</a> <span class="sep">></span> <span>درباره ما</span></p>
    </div>
  </div>


  <div class="site-section" data-aos="fade">
    <div class="container">
      <div class="row align-items-center">
        <?php $__currentLoopData = $biographies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 mb-5 mb-md-0">
            <div class="img-border">
              <a href="https://vimeo.com/28959265" class="">
                <img src="/UploadedImages/about/<?php echo e($bio->image); ?>" alt="Image" class="img-fluid rounded">
              </a>
            </div>
        </div>
        <div class="col-md-5 ml-auto" style="text-align: right">
          <div class="text-right mb-5 section-heading">
            <h2>درباره ما</h2>
          </div>

          <p class="mb-4 h5 font-italic lineheight1-5"><?php echo e($bio->description); ?></p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.masterLayouts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
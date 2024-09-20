<?php $__env->startSection('content'); ?>
  <div style="height: 113px;"></div>
<div class="unit-5 overlay" style="background-image: url('/website/images/about-us.png');">
      <div class="container text-center">
        <h2 class="mb-0">تماس باما</h2>
        <p class="mb-0 unit-6"><a href="index.html">خانه</a> <span class="sep">></span> <span>تماس باما</span></p>
      </div>
    </div>


    <?php if($success = session('success')): ?>
        <div class="alert alert-success alert-dismissible">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <center><strong><?php echo e($success); ?></strong></center>
       </div>
     <?php endif; ?>



    <div class="site-section bg-light" style="text-align: right" dir="rtl">
      <div class="container">
        <div class="row">

          <div class="col-md-12 col-lg-8 mb-5">

            <form method="POST" action="<?php echo e(route('SendMessage')); ?>" class="p-5 bg-white">
                <?php echo e(csrf_field()); ?>


              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">اسم کامل</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="رحمت الله بیژن">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">ایمیل</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="rahmatullahbizhan@gmail.com">
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">موضوع پیام شما</label>
                  <input type="text" name="subject" id="subject" class="form-control" placeholder="موضوع پیام شما">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">پیام</label>
                  <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="پیام شما..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="ارسال پیام" class="btn btn-primary pill px-4 py-2">
                </div>
              </div>


            </form>
          </div>

          <div class="col-lg-4">
            <img src="/website/images/FB_IMG_1639472305615.jpg" alt="" width="100%"/>
            <?php $__currentLoopData = $biographies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">معلومات مختصر</h3>
              <p><?php echo e($bio->description); ?></p>
              <p><a href="#" class="btn btn-primary px-4 py-2 text-white pill">بیشتر بخوانید</a></p>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.masterLayouts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
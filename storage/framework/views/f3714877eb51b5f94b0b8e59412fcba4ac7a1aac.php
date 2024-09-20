<?php $__env->startSection('content'); ?>
<div style="height: 113px;"></div>
<div class="unit-5 overlay" style="background-image: url('/website/images/FB_IMG_1639472072095.jpg');">
  <div class="container text-center">
    <h2 class="mb-0">نمایندگی ها</h2>
    <p class="mb-0 unit-6"><a href="index.html">خانه</a> <span class="sep">></span> <span>همکاران / شرکا</span></p>
  </div>
</div>





<div class="site-section block-15">
  <div class="container">
    <!-- Content -->
      <div class="content-area py-1" dir="rtl" style="text-align: center">
        <div class="container-fluid">
          <div class="box box-block bg-white">
            <div class="overflow-x-auto table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-3">
                <thead>
                  <tr>
                    <th>شماره</th>
                    <td style="width: 50px !important; ">عکس</td>
                    <th>نام</th>
                    <th>فعالیت</th>
                    <th>تلفن</th>
                    <th>ایمیل</th>
                    <th>آدرس</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($loop->iteration); ?></td>
                      <td  style="width: 50px !important; padding: 2px;">
                        <img src="<?php echo e(asset('UploadedImages/companies').'/'.$company->image); ?>"  style="width: 100% !important; ">
                      </td>
                      <td><?php echo e($company->companyName); ?></td>
                      <td><?php echo e($company->activity); ?></td>
                      <td><?php echo e($company->phone); ?></td>
                      <td><?php echo e($company->email); ?></td>
                      <td><?php echo e($company->address); ?></td>
                    </tr>
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

<?php echo $__env->make('website.masterLayouts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
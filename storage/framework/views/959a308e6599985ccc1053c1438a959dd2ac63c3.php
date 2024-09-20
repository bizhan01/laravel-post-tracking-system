<?php $__env->startSection('content'); ?>
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
        <!-- Content -->
        <div class="content-area py-1">
          <div class="container-fluid">
            <div class="box box-block bg-white">
              <center><h4>لیست کاربران بلاک شده</h4> </center>
              <h6 class="mb-1">نمایش اطلاعات</h6>
              <table class="table table-striped table-bordered dataTable">
                <thead>
                  <tr>
                    <th>شماره</th>
                    <th>عکس</th>
                    <th>اسم کامل</th>
										<th>نمایندگی</th>
                    <th>ایمیل</th>
                    <th>فعال سازی</th>
                    <th>حذف</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><a href="/UploadedImages/<?php echo e($user->profileImage); ?>"><img style="height: 30px" src="UploadedImages/<?php echo e($user->profileImage); ?>" alt="" /> </a></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->site); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><a href = 'unBlockUser/<?php echo e($user->id); ?>'  title="فعال سازی"> <i class="fa fa-check text-success"></i></a></td>
                    <td><a href = 'delete/<?php echo e($user->id); ?>' onclick='return confirm("حذف شود؟")' title="حذف"> <i class="fa fa-trash text-danger"></i></a></td>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
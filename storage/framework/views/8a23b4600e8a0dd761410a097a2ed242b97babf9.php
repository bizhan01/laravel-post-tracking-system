<?php $__env->startSection('content'); ?>
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
        <center> <h4>ثبت کاربر جدید در سیستم</h4> </center><br>

          <form method="POST" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>


              <div class="row form-group" >
                 <div class="col-md-4">
                   <label  for="Field of Study" style="color:black">اسم کامل </label>
                   <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus required placeholder="اسم کامل کاربر">

                   <?php if($errors->has('name')): ?>
                       <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($errors->first('name')); ?></strong>
                       </span>
                   <?php endif; ?>
                   </div>

                   <div class="col-lg-4">
                   <label  for="University Name" style="color:black">ایمیل آدرس</label>
                   <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required required placeholder="someone@domain.com">
                   <?php if($errors->has('email')): ?>
                       <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($errors->first('email')); ?></strong>
                       </span>
                   <?php endif; ?>
                   </div>

									 <div class="col-lg-4">
									 <label  for="" style="color:black">نمایندگی</label>
									 <input type="text" name="site"  class="form-control"   required placeholder="اسم نمایندگی">
									 </div>
                 </div>


                 <div class="row form-group" >
                   <div class="col-lg-4 ">
                   <label  for="University Name" style="color:black">گذرواژه</label>
                   <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required placeholder="**********">
                   <?php if($errors->has('password')): ?>
                       <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($errors->first('password')); ?></strong>
                       </span>
                   <?php endif; ?>
                   </div>


                   <div class="col-lg-4">
                     <label  for="Field of Study" style="color:black">تکرار گذرواژه </label>
                     <input id="password-confirm" type="password" class="form-control"  name="password_confirmation"  required required placeholder="**********">
                  </div>



									<input type="hidden" name="address" value=" ">
									<input type="hidden" name="phone_number" value=" ">


                  <div class="col-lg-4">
                   <div class="wrap-input100 validate-input form-control" data-validate = "Pleas Select Your Acount Type" style="border: none; outline: none;">
                     <label class="label-input100 text-black">نوعیت کاربری</label><br>
                     <input class="" type="radio" name="isAdmin"  id="isAdmin" value="2" checked>
                     <span class="label-input100">مدیر</span> &nbsp;&nbsp;&nbsp;
                   </div>
                 </div>

							 </div>


    			 		<div class="row">
                 <div class="col-lg-4">
                   <div class="wrap-input100 validate-input form-control" data-validate = "Pleas Select Your Acount Type" style="border: none; outline: none; margin-top: 20px;">
                    <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-save"></i> اضافه نمودن کارمند </button>
                 </div>
                 </div>
              </div>


             <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </form>

              <!-- Content -->
              <div class="content-area py-1">
                <div class="container-fluid">
                  <div class="box box-block bg-white">
                    <center><h4>مدیر سیستم</h4> </center>
                    <h6 class="mb-1">نمایش اطلاعات</h6>
                    <table class="table table-striped table-bordered dataTable">
                      <thead>
                        <tr>
                          <th>شماره</th>
                          <th>عکس</th>
                          <th>اسم کامل</th>
                          <th>نمایندگی</th>
                          <th>ایمیل</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td><a href="/UploadedImages/<?php echo e($user->profileImage); ?>"><img style="height: 30px" src="UploadedImages/<?php echo e($user->profileImage); ?>" alt="" /> </a></td>
                          <td><?php echo e($user->name); ?></td>
                          <td><?php echo e($user->site); ?></td>
                          <td><?php echo e($user->email); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- Content -->
              <div class="content-area py-1">
                <div class="container-fluid">
                  <div class="box box-block bg-white">
                    <center><h4>لیست کاربران سیستم </h4> </center>
                    <h6 class="mb-1">نمایش اطلاعات</h6>
                    <table class="table table-striped table-bordered dataTable">
                      <thead>
                        <tr>
                          <th>شماره</th>
                          <th>عکس</th>
                          <th>اسم کامل</th>
													<th>نمایندگی</th>
                          <th>ایمیل</th>
                          <th>حذف کاربر</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td><a href="/UploadedImages/<?php echo e($user->profileImage); ?>"><img style="height: 30px" src="UploadedImages/<?php echo e($user->profileImage); ?>" alt="" /> </a></td>
                          <td><?php echo e($user->name); ?></td>
                          <td><?php echo e($user->site); ?></td>
                          <td><?php echo e($user->email); ?></td>
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
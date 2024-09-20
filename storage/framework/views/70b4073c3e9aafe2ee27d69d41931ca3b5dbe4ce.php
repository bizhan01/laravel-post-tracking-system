<?php $__env->startSection('content'); ?>
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
        <!-- ُSuccess Flash Message -->
          <?php if($success = session('success')): ?>
          <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <div><?php echo e($success); ?></div>
          </div>
          <?php endif; ?>
				<center><h3>ثبت نمایندگی جدید</h3></center>
        <form method="POST" action="<?php echo e(route('addCompany')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

            <div class="row form-group">
              <div class="col-md-6">
                <label  style="color: black">اسم نمایندگی<span style="color: red">*</span></label>
                <input type="text" name="companyName" value=""  class="form-control"  placeholder="اسم نمایندگی" required>
              </div>
							<div class="col-md-6">
								<label  style="color: black">نوع نمایندگی<span style="color: red">*</span></label>
								<select class="form-control" name="activity" required>
									<option value="">----------------</option>
									<option>داخلی</option>
									<option>خارجی</option>
								</select>
							</div>
            </div>

						<div class="row form-group">
							<div class="col-md-4">
								<label  style="color: black">شماره تماس <span style="color: red">*</span></label>
								<input type="text" name="phone" placeholder="0799999999" data-mask="0799999999" class="form-control" style="direction: ltr" required>
							</div>
							<div class="col-md-4">
								<label  style="color: black">ایمیل آدرس <span style="color: red">*</span></label>
								<input type="email" name="email" value=""  class="form-control"  placeholder="like: rahmatulllahbizhan@gmail.com" required>
							</div>
							<div class="col-md-4">
								<label  style="color: black">آدرس فزیکی <span style="color: red">*</span></label>
								<input type="text" name="address" value=""  class="form-control"  placeholder="آدرس فزیکی" required>
							</div>
						</div>

            <div class="row form-group">
              <div class="col-md-12">
                <label  style="color: black">تصویر / لوگو</label>
                <input type="file"  name="image" id="input-file-now" class="dropify" />
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6">
                <input type="submit" name="submit" value="ذخیره" class="btn btn-success ">
              </div>
           </div>
          <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </form>
      </nav>
    </div>
  </div>



<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
		<div class="box box-block bg-white">
			<center><h3>لیست نمایندگی ها</h3></center>
 			<div class="overflow-x-auto">
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
 							<td>ویرایش</td>
 							<td>خذف</td>
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
 								<td>
									<a href="<?php echo e(url('editCompany').'/' .$company->id); ?>" title="ویرایش">
										<i class="ti-pencil-alt"></i>
									</a>
								</td>
								<td>
									<a href="<?php echo e(url('deleteCompany').'/' .$company->id); ?>" title="حذف" onclick='return confirm("آیا مطمیین استید که حذف شود ؟")'>
 										<i class="ti ti-trash text-danger"></i>
 									</a>
								</td>
 							</tr>
 						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 					</tbody>
 				</table>
 			</div>
 		</div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
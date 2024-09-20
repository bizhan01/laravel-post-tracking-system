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
				<center><h3>ثبت مشخصات شرکت </h3></center>
        <form method="POST" action="<?php echo e(route('addBio')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

            <div class="row form-group">
              <div class="col-md-6">
                <label  style="color: black">اسم شرکت <span style="color: red">*</span></label>
                <input type="text" name="companyName" value=""  class="form-control"  placeholder="اسم شرکت" required>
              </div>
              <div class="col-md-6">
                <label  style="color: black">آدرس <span style="color: red">*</span></label>
                <input type="text" name="address" value=""  class="form-control"  placeholder="آدرس" required>
              </div>
            </div>
						<div class="row form-group">
							<div class="col-md-4">
								<label  style="color: black">تلفن اول <span style="color: red">*</span></label>
								<input type="text" name="phone1" placeholder="0799999999" data-mask="0799999999" class="form-control" style="direction: ltr" required>
							</div>
							<div class="col-md-4">
								<label  style="color: black">تلفن دوم</label>
								<input type="text" name="phone2" placeholder="0799999999" data-mask="0799999999" class="form-control" style="direction: ltr" >
							</div>
							<div class="col-md-4">
								<label  style="color: black">ایمیل آدرس <span style="color: red">*</span></label>
								<input type="email" name="email" value=""  class="form-control"  placeholder="ایمیل آدرس" required>
							</div>
						</div>
            <div class="row form-group">
              <div class="col-md-6">
                <label  style="color: black">معلومات مختصر <span style="color: red">*</span></label><br>
                <textarea name="description" rows="10" class="col-md-12" placeholder="لطفا شرکت تان را در 500 کراکتر مختصر معرفی کنید..." required></textarea>
              </div>
              <div class="col-md-6">
                <label  style="color: black">تصویر <span style="color: red">*</span></label>
                <input type="file"  name="image" id="input-file-now" class="dropify" required/>
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
   <div class="col-lg-12 box box-block bg-white">
     <center><h3>نمایش مشخصات شرکت</h3></center>

     <div class="row mb-0 mb-md-1" >
      <?php $__currentLoopData = $biographies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="col-md-12">
         <div class="box bg-white post post-2" style="height: 400px">
           <div class="p-img img-cover" style="background-image: url(/UploadedImages/about/<?php echo e($bio->image); ?>);"></div>
           <div class="p-content" >
             <h5 class="text-truncate"><a class="text-black" href="#"><?php echo e($bio->companyName); ?></a></h5>
             <div><p><?php echo e($bio->description); ?></p></div><br>

             <span class="p-text" > آدرس: <?php echo e($bio->address); ?></span><br>
             <span class="p-text" > ایمیل: <?php echo e($bio->email); ?></span><br>
             <span class="p-text" > تلفن اول: <?php echo e($bio->phone1); ?></span><br>
             <span class="p-text" > تلفن دوم: <?php echo e($bio->phone2); ?></span><br>
             <div class="p-info">
               <a class="text-success" href="editBio/<?php echo e($bio->id); ?>"><i class="fa fa-edit"></i><br>ویرایش</a>
               <a class="text-danger" href="deleteBio/<?php echo e($bio->id); ?>" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash"></i><br>حذف</a>
             </div>
           </div>
         </div>
       </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
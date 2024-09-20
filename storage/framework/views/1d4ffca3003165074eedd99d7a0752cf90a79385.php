<?php $__env->startSection('content'); ?>
<!-- Content -->
<div class="content-area py-1">
	<div class="container-fluid">
    <nav class="navbar navbar-light bg-white b-a mb-2">
      <center>
        <h3>ویرایش سفارش</h3>
        <h3>نمبر سفارش: <?php echo $order[0]->id;?></h3>
      </center><br>
			<form action = "/updateOrder/<?php echo $order[0]->id; ?>" method = "post" enctype="multipart/form-data" >
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
					           <input type="hidden" name="source_id" value="<?php echo $order[0]->source_id; ?>">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>اسم فرستنده<span style="color: red">*</span></label>
								<input type="text" class="form-control" name="senderName" value = '<?php echo $order[0]->senderName; ?>' placeholder="اسم کوچک + اسم خانوادگی" required>
								<span class="font-90 text-muted"></span>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>تلفن فرستنده<span style="color: red">*</span></label>
								<input type="text" name="senderPhone" value = '<?php echo $order[0]->senderPhone; ?>' placeholder="0799999999" data-mask="0799999999" class="form-control" style="direction: ltr" required>
								<span class="font-90 text-muted"></span>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>محصول<span style="color: red">*</span></label>
								<input type="text" class="form-control" name="product"  value = '<?php echo $order[0]->product; ?>' placeholder="محموله پستی" required>
								<span class="font-90 text-muted"></span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>نمایندگی<span style="color: red">*</span></label>
								<select class="form-control" name="destination_id" required>
									<option value = '<?php echo $order[0]->destination_id; ?>'>----------------</option>
									<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($user->id); ?>"><?php echo e($user->site); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>اسم گیرنده<span style="color: red">*</span></label>
								<input type="text" class="form-control" name="receiverName" value = '<?php echo $order[0]->receiverName; ?>' placeholder="اسم کوچک + اسم خانوادگی" required>
								<span class="font-90 text-muted"></span>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>تفلن گیرنده<span style="color: red">*</span></label>
								<input type="text" name="receiverPhone" value = '<?php echo $order[0]->receiverPhone; ?>' placeholder="0799999999" data-mask="0799999999" class="form-control" style="direction: ltr" required>
								<span class="font-90 text-muted"></span>
							</div>
						</div>
					</div>
				 <div class="row form-group">
           <input type="hidden" name="status" value="<?php echo $order[0]->status; ?>">
				 </div>

				 <div class="row form-group">
					 <div class="col-md-6">
						 <input type="submit"value="ذخیره سازی تغییرات" class="btn btn-success ">
						 <input type="reset"  value="لغو" class="btn btn-warning ">
					 </div>
				</div>
			 <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </form>
    </nav>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
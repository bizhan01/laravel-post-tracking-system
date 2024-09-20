<?php $__env->startSection('content'); ?>

<div class="content-area py-1">
		<div class="box box-block bg-white">
			<center><h3>افزودن پست جدید</h3></center><br>
			<?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php if(session('order_id')): ?>
			<div class="alert alert-success-fill alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<span>آی دی سفارش</span><br>
				<h1><?php echo e(session('order_id')); ?></h1>
			</div>
			<?php endif; ?>

			<form method="post" action="<?php echo e(route('addOrder')); ?>" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<input type="hidden" name="id" value="<?php date_default_timezone_set('asia/kabul')?><?php echo e(date('yHis')); ?>">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>اسم فرستنده<span style="color: red">*</span></label>
							<input type="text" class="form-control" name="senderName" placeholder="اسم کوچک + اسم خانوادگی" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>تلفن فرستنده<span style="color: red">*</span></label>
							<input type="text" name="senderPhone" placeholder="0799999999" data-mask="0799999999" class="form-control" style="direction: ltr" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>محصول<span style="color: red">*</span></label>
							<input type="text" class="form-control" name="product" placeholder="محموله پستی" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>نمایندگی<span style="color: red">*</span></label>
							<select class="form-control" name="destination_id" required>
								<option value="">----------------</option>
								<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							 		<option value="<?php echo e($user->id); ?>"><?php echo e($user->site); ?> - <?php echo e($user->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>اسم گیرنده<span style="color: red">*</span></label>
							<input type="text" class="form-control" name="receiverName" placeholder="اسم کوچک + اسم خانوادگی" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>تفلن گیرنده<span style="color: red">*</span></label>
							<input type="text" name="receiverPhone" placeholder="0799999999" data-mask="0799999999" class="form-control" style="direction: ltr" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>




				<div class="row">
					<input type="hidden" name="status" value="1">
					<div class="col-md-12">
						<button type="submit" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
							<i class="ti-save"></i>
							<span>ذخیره</span>
						</button>
						<button type="reset" class="btn btn-outline-danger mb-0-25 waves-effect waves-light">
							<i class="ti-loop"></i>
							<span>لغو</span>
						</button>
					</div>
				</div>
			</form>

		</div>
	</div>


	<!-- Content -->
	<div class="content-area py-1">
	  <div class="container-fluid">
			<div class="box box-block bg-white">
				<center><h3>لیست شفارشات</h3></center><br>
	 			<div class="overflow-x-auto">
	 				<table class="table table-striped table-bordered dataTable" id="table-3">
	 					<thead>
	 						<tr>
	 							<th>شماره</th>
	 							<th>آی دی سفارش</th>
	 							<th>مبدا</th>
	 							<th>فرستنده</th>
	 							<th>تلفن</th>
	 							<th>محموله</th>
	 							<th>مقصد</th>
	 							<th>گیرنده</th>
	 							<th>تلفن</th>
	 							<th>وضعیت</th>
	 							<td>تغییر وضیعت</td>
	 							<td>ویرایش</td>
	 							<td class="with-sub <?php if (Auth::user()->isAdmin == '2'): ?>
		              <?php echo 'hide' ?>
		              <?php endif ?>">خذف</td>
	 						</tr>
	 					</thead>
	 					<tbody>
	 						<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	 							<tr>
	 								<td><?php echo e($loop->iteration); ?></td>
	 								<td><?php echo e($order->id); ?></td>
	 								<td><?php echo e($order->source); ?></td>
	 								<td><?php echo e($order->senderName); ?></td>
	 								<td><?php echo e($order->senderPhone); ?></td>
	 								<td><?php echo e($order->product); ?></td>
	 								<td><?php echo e($order->destination); ?></td>
	 								<td><?php echo e($order->receiverName); ?></td>
	 								<td><?php echo e($order->receiverPhone); ?></td>
	 								<td>
										<center>
											<?php if($order->status == 1): ?>
												<input type="button" class="btn btn-danger btn-rounded btn-sm" value="در حال پروسیس">
											<?php elseif($order->status == 2): ?>
												<input type="button" class="btn btn-warning btn-rounded btn-sm" value="ارسال شده">
											<?php elseif($order->status == 3): ?>
												<input type="button" class="btn btn-info btn-rounded btn-sm" value="آماده تحویل">
											<?php else: ?>
												<input type="button" class="btn btn-success btn-rounded btn-sm" value="دریافت شده">
											<?php endif; ?>
									 </center>
									</td>
	 								<td>
										<a href="<?php echo e(url('confirmOrder').'/' .$order->id); ?>" title="تغییر وضیعت">
											<i class="ti-loop text-success"></i>
										</a>
									</td>
									<td>
										<a href="<?php echo e(url('editOrder').'/' .$order->id); ?>" title="ویرایش">
											<i class="ti-pencil-alt"></i>
										</a>
									</td>
									<td class="with-sub <?php if (Auth::user()->isAdmin == '2'): ?>
			              <?php echo 'hide' ?>
			              <?php endif ?>">
										<a href="<?php echo e(url('deleteOrder').'/' .$order->id); ?>" title="حذف" onclick='return confirm("آیا مطمیین استید که حذف شود ؟")'>
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
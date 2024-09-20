<?php $__env->startSection('content'); ?>
<!-- Content -->
<div class="content-area py-1">
	<div class="container-fluid">
		<div class="box box-block bg-white">
			<center><h3>مرسولات/محموله های در حال پراسیس</h3></center><br>
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
							<th>تغییر وضیعت</th>
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
<?php $__env->startSection('content'); ?>
<!-- Content -->
<div class="content-area py-1">
	<div class="container-fluid">
    <nav class=" mb-2">
			<div class="col-sm-4 push-sm-4">
				<div class="card price-card">
					<div class="card-header price-card-header bg-primary text-xs-center">
						<h6 class="text-uppercase">تایید سفارش</h6>
						<h3 class="mb-0">
							<span class="text-big"><?php echo $order[0]->id;?></span>
						</h3>
					</div>
					<form action = "/updateOrder/<?php echo $order[0]->id; ?>" method = "post" enctype="multipart/form-data" >
							<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
							 <input type="hidden" name="source_id" value="<?php echo $order[0]->source_id; ?>">
								<ul class="price-card-list pl-0 mb-0">
									<li>
										<i class="fa fa-check text-success mr-0-25"></i>اسم فرستنده:
										<input  type="text" readonly class="form-control" name="senderName" value = '<?php echo $order[0]->senderName; ?>'>
									</li>
									<li>
										<i class="fa fa-check text-success mr-0-25"></i>تلفن فرستنده:
										<input type="text" readonly class="form-control" name="senderPhone" value = '<?php echo $order[0]->senderPhone; ?>'>
									</li>
									<li>
										<i class="fa fa-check text-success mr-0-25"></i>محصول:
										<input type="text" readonly class="form-control" class="form-control" name="product"  value = '<?php echo $order[0]->product; ?>'>
									</li>
									 <input type="hidden" readonly class="form-control" name="destination_id" value="<?php echo $order[0]->destination_id; ?>">
									<li>
										<i class="fa fa-check text-success mr-0-25"></i>اسم گیرنده:
											<input type="text" readonly class="form-control" class="form-control" name="receiverName" value = '<?php echo $order[0]->receiverName; ?>'>
									</li>
									<li>
										<i class="fa fa-check text-success mr-0-25"></i>تفلن گیرنده:
											<input type="text" readonly class="form-control" name="receiverPhone" value = '<?php echo $order[0]->receiverPhone; ?>'>
									</li>
									<li>
										<i class="fa fa-check text-success mr-0-25"></i>تغییر وضیعت:
										<select class="form-control" name="status" required="">
											<option value="">------------</option>
											<option value="1">در حال آماده شدن</option>
											<option value="2">ارسال گردیده</option>
											<option value="3">آماده ی تحویل</option>
											<option value="4">تحویل داده شده</option>
										</select>
									</li>
								</ul>
								<div class="card-footer">
										<input type="submit"value="ذخیره سازی تغییرات"  class="btn btn-primary btn-block btn-lg">
								</div>
						<?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				 </form>
				</div>
			</div>
    </nav>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
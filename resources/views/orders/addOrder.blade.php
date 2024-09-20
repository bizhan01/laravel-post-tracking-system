@extends('layouts.master')
@section('content')

<div class="content-area py-1">
		<div class="box box-block bg-white">
			<center><h3>افزودن پست جدید</h3></center><br>
			@include('layouts.errors')
			@if(session('order_id'))
			<div class="alert alert-success-fill alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<span>آی دی سفارش</span><br>
				<h1>{{ session('order_id') }}</h1>
			</div>
			@endif

			<form method="post" action="{{ route('addOrder') }}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="<?php date_default_timezone_set('asia/kabul')?>{{date('yHis')}}">
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
								@foreach($users as $user)
							 		<option value="{{$user->id}}">{{$user->site}} - {{$user->name}}</option>
								@endforeach
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
	 						@foreach($orders as $order)
	 							<tr>
	 								<td>{{ $loop->iteration }}</td>
	 								<td>{{ $order->id}}</td>
	 								<td>{{ $order->source}}</td>
	 								<td>{{ $order->senderName}}</td>
	 								<td>{{ $order->senderPhone}}</td>
	 								<td>{{ $order->product}}</td>
	 								<td>{{ $order->destination}}</td>
	 								<td>{{ $order->receiverName}}</td>
	 								<td>{{ $order->receiverPhone}}</td>
	 								<td>
										<center>
											@if($order->status == 1)
												<input type="button" class="btn btn-danger btn-rounded btn-sm" value="در حال پروسیس">
											@elseif($order->status == 2)
												<input type="button" class="btn btn-warning btn-rounded btn-sm" value="ارسال شده">
											@elseif($order->status == 3)
												<input type="button" class="btn btn-info btn-rounded btn-sm" value="آماده تحویل">
											@else
												<input type="button" class="btn btn-success btn-rounded btn-sm" value="دریافت شده">
											@endif
									 </center>
									</td>
	 								<td>
										<a href="{{url('confirmOrder').'/' .$order->id}}" title="تغییر وضیعت">
											<i class="ti-loop text-success"></i>
										</a>
									</td>
									<td>
										<a href="{{url('editOrder').'/' .$order->id}}" title="ویرایش">
											<i class="ti-pencil-alt"></i>
										</a>
									</td>
									<td class="with-sub <?php if (Auth::user()->isAdmin == '2'): ?>
			              <?php echo 'hide' ?>
			              <?php endif ?>">
										<a href="{{url('deleteOrder').'/' .$order->id}}" title="حذف" onclick='return confirm("آیا مطمیین استید که حذف شود ؟")'>
	 										<i class="ti ti-trash text-danger"></i>
	 									</a>
									</td>
	 							</tr>
	 						@endforeach
	 					</tbody>
	 				</table>
	 			</div>
	 		</div>
	  </div>
	</div>
@endsection

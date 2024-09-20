@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
	<div class="container-fluid">
		<div class="box box-block bg-white">
			<center><h3>مرسولات/محموله های ارسال شده</h3></center><br>
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
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@extends('layouts.app')

@section('content')
	<div class="container">
		<h2 class="font-semibold mgbt-xs-20">You're previous orders</h2>
		<div class="row">
			<!-- main content start -->
			<div class="col-md-9">
				<table class="table">
					<thead>
						<tr>
							<th>Invoice #</th>
							<th>Status</th>
							<th>Pruchased Date</th>
							<th>Items Quantity</th>
							<th>Amount</th>
							<th>Shipping Fee</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $orders as $order )
							<tr>
								<td><a href="/order/{{$order->id}}">{{ $order->id }} </a> </td>
								<td>{{ $order->status }}</td>
								<td>{{ $order->purchased_at }}</td>
								<td>{{ $order->totalQuantity }}</td>
								<td>{{ $order->total }}</td>
								<td>{{ $order->shipping_fee }}</td>
								<td>{{ $order->grand_total }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- main content end -->
			<!-- right side start -->
			@include('account.links-login')
			<!-- right side end -->
			
		</div>
	</div>
@endsection
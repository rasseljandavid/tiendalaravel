@extends('layouts.app')

@section('metainfo')
	<title>{{ Auth::user()->getFullname() }} on Tienda</title>
	<meta name="description" content="{{ Auth::user()->getFullname() }} Tienda Profile">
@endsection

@section('content')
    
<div class="container">
  <div class="row">
  	<div class="col-sm-9">
		  <h1>My Address&nbsp;<small><a href="{{url('/address/edit')}}" class="ju">edit</a></small></h1>
		  <hr />
  		  <div class="col-md-12">
			<table class="table table-bordered">
			  	<thead>
			  		<tr>
			  			<th>&nbsp</th>
			  			<th>Shipping Address</th>
			  			<th>Billing Address</th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<tr>
				      	<td>To</td>
				      	<td>@if($shipping){{ $shipping->to }}@endif</td>
				      	<td>@if($billing){{ $billing->to }}@endif</td>
				    </tr>
				    <tr>
				      	<td>Address</td>
				      	<td>@if($shipping){{ $shipping->address_one }}@endif</td>
				      	<td>@if($billing){{ $billing->address_one }}@endif</td>
				    </tr>
				    <tr>
				      	<td>City / Municipality</td>
				      	<td>@if($shipping){{ $shipping->city }}@endif</td>
				      	<td>@if($billing){{ $billing->city }}@endif</td>
				    </tr>
				    <tr>
				      	<td>Zip Code</td>
				      	<td>@if($shipping){{ $shipping->zipcode }}@endif</td>
				      	<td>@if($billing){{ $billing->zipcode }}@endif</td>
				    </tr>
				    <tr>
				      	<td>Country</td>
				      	<td>@if($shipping){{ $shipping->country }}@endif</td>
				      	<td>@if($billing){{ $billing->country }}@endif</td>
				    </tr>
			  	</tbody>
			</table>
		</div>
  	</div>

  	@include('account.links-login')
  	
  </div>
</div>
@endsection
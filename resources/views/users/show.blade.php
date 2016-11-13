@extends('layouts.app')

@section('metainfo')
	<link href="image/favicon.png" rel="icon" />
	<title>{{ Auth::user()->getFullname() }} on Tienda</title>
	<meta name="description" content="{{ Auth::user()->getFullname() }} Tienda Profile">
@endsection

@section('content')
    
<div class="container">
  <div class="row">
  	<div class="col-sm-9">
		<h1>My Account&nbsp;<small><a href="{{url('/account/edit')}}" class="ju">edit</a></small></h1>
		<hr>
  		<div class="col-md-6">
			<div class="table-responsive">
				<table class="table table-bordered">
          <thead>
            <tr>
              <th colspan="2">General</th>
            </tr>
          </thead>
				  <tbody>
				    <tr>
				      <td>Firstname</td>
				      <td>{{ Auth::user()->firstname }}</td>
				    </tr>
				    <tr>
				      <td>Lastname</td>
				      <td>{{ Auth::user()->lastname }}</td>
				    </tr>
				    <tr>
				      <td>Email</td>
				      <td>{{ Auth::user()->email }}</td>
				    </tr>
				    <tr>
				      <td>Contact Number</td>
				      <td>{{ Auth::user()->contact }}</td>
				    </tr>
				  </tbody>
				</table>
			</div>
		</div>

		<div class="col-md-12">
			<table class="table table-bordered">
			  	<thead>
			  		<tr>
			  			<th>&nbsp</th>
			  			<th>Shipping Address<?php $shipping = Auth::user()->getShippingAddress(); ?></th>
			  			<th>Billing Address<?php $billing = Auth::user()->getBillingAddress(); ?></th>
			  		</tr>
			  	</thead>
			  	<tbody>
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
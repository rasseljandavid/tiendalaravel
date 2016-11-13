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
		<h1>Editing Account information</h1>
		<hr>
		<form method="POST" action="{{ url('/account/update') }}" method="POST" class="form">
			{{ csrf_field() }}
  		<div class="col-md-12">
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
				      <td><input type="text" name="firstname" value="{{ $user->firstname or old('firstname') }} " required="required" class="form-control"></td>
				    </tr>
				    <tr>
				      <td>Lastname</td>
				      <td><input type="text" name="lastname" value="{{ $user->lastname or old('lastname') }}" required="required" class="form-control"></td>
				    </tr>
				    <tr>
				      <td>Email</td>
				      <td><input type="email" name="email" value="{{ $user->email or old('email') }}" required="required" class="form-control"></td>
				    </tr>
				    <tr>
				      <td>Contact Number</td>
				      <td><input type="number" name="contact" value="{{ $user->contact or old('contact') }}" required="required"></td>
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
			  			<th>Shipping & Billing Address<?php $shipping = Auth::user()->getShippingAddress(); ?></th>
			  		</tr>
			  	</thead>
			  	<tbody>
				    <tr>
				      	<td>Address</td>
				      	<td><input type="text" id="input-address-one" name="address_one" value="{{ $shipping->address_one or old('address_one') }}" class="form-control"></td>
				    </tr>
				    <tr>
				      	<td>City / Municipality</td>
				      	<td><select class="form-control" id="input-city" name="city">
                      <option value=""> --- Please Select --- </option>
                      <option value="Angeles" data-zipcode="2009">Angeles</option>
                      <option value="Mabalacat" data-zipcode="2010">Mabalacat</option>
                      <option value="Bamban" data-zipcode="2317">Bamban</option>
                      <option value="Magalang" data-zipcode="2011">Magalang</option>
                    </select>
                 </td>
				    </tr>
				    <tr>
				      	<td>Zip Code</td>
				      	<td><input type="text" class="form-control" id="input-zipcode" name="zipcode" value="{{ $shipping->zipcode or old('zipcode') }}" ></td>
				    </tr>
				    <tr>
				      	<td>Country</td>
				      	<td>
				      		<select class="form-control" id="input-country" name="country">
                    <option value="Philippines" selected="true" readonly>Philippines</option>
                  </select>
				      	</td>
				    </tr>
			  	</tbody>
			</table>


				<input type="submit" name="submit" class="btn btn-lg btn-primary" value="Save Changes">
			</form>
		</div>

		<!-- <div class="col-md-12" style="padding: 3px !important;">
			<div class="col-md-6 col-xs-12 text-center" style="margin-bottom: 10px;">
				<a href="{{ url('/cart/show') }}" class="btn btn-primary btn-lg col-md-10 col-xs-12"><i class="fa fa-shopping-cart"></i> View Cart</a>	
			</div>
			<div class="col-md-6 col-xs-12 text-center">
				<a href="{{ url('/cart/checkout') }}" class="btn btn-primary btn-lg col-md-10 col-xs-12"><i class="fa fa-share"></i> Checkout</a>	
			</div>
		</div> -->
  	</div>

  	@include('account.links-login')
  	
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#input-city').change(function(){
            $('#input-zipcode').val($(this).find(':selected').attr('data-zipcode'));
        });
    });
</script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  	<div class="col-sm-9">
  		<h1>Editing Address</h1>
  		<hr>
  		<form method="POST" action="{{ url('/address/update') }}" method="POST" class="form">
  			{{ csrf_field() }}
    		<div class="col-md-12">
    			<div class="table-responsive">
					<table class="table table-bordered">
					  	<thead>
					  		<tr>
					  			<th>&nbsp</th>
					  			<th>Shipping Address</th>
					  		</tr>
					  	</thead>
					  	<tbody>
					  		<tr>
						      	<td>To</td>
						      	<td><input type="text" id="input-ship-to" name="shipping_to" value="{{ $shipping->to or old('shipping_to') }}" class="form-control"></td>
						    </tr>
						    <tr>
						      	<td>Address</td>
						      	<td><input type="text" id="input-address-one" name="shipping_address_one" value="{{ $shipping->address_one or old('shipping_address_one') }}" class="form-control"></td>
						    </tr>
						    <tr>
						      	<td>City / Municipality</td>
						      	<td>
						      		<select class="form-control" id="shipping-city" name="shipping_city">
				                      <option value=""> --- Please Select --- </option>
				                      <option value="Angeles" data-zipcode="2009" @if($shipping->city == 'Angeles') selected @endif>Angeles</option>
				                      <option value="Mabalacat" data-zipcode="2010" @if($shipping->city == 'Mabalacat') selected @endif>Mabalacat</option>
				                      <option value="Bamban" data-zipcode="2317" @if($shipping->city == 'Bamban') selected @endif>Bamban</option>
				                      <option value="Magalang" data-zipcode="2011" @if($shipping->city == 'Magalang') selected @endif>Magalang</option>
				                    </select>
		                 		</td>
						    </tr>
						    <tr>
						      	<td>Zip Code</td>
						      	<td>
						      		<input type="text" class="form-control" id="shipping-zipcode" name="shipping_zipcode" value="{{ $shipping->zipcode or old('shipping_zipcode') }}" >
						      	</td>
						    </tr>
						    <tr>
						      	<td>Country</td>
						      	<td>
						      		<select class="form-control" id="shipping-country" name="shipping_country">
		                    			<option value="Philippines" selected="true" readonly>Philippines</option>
		                 			 </select>
						      	</td>
						    </tr>
					  	</tbody>
					</table>
    			</div>

    			<div class="table-responsive">
					<table class="table table-bordered">
					  	<thead>
					  		<tr>
					  			<th>&nbsp</th>
					  			<th>Billing Address</th>
					  		</tr>
					  	</thead>
					  	<tbody>
					  		<tr>
						      	<td>To</td>
						      	<td><input type="text" id="input-ship-to" name="billing_to" value="{{ $billing->to or old('billing_to') }}" class="form-control"></td>
						    </tr>
						    <tr>
						      	<td>Address</td>
						      	<td><input type="text" id="input-address-one" name="billing_address_one" value="{{ $billing->address_one or old('billing_address_one') }}" class="form-control"></td>
						    </tr>
						    <tr>
						      	<td>City / Municipality</td>
						      	<td>
						      		<select class="form-control" id="billing-city" name="billing_city">
				                      <option value=""> --- Please Select --- </option>
				                      <option value="Angeles" data-zipcode="2009" @if($billing->city == 'Angeles') selected @endif>Angeles</option>
				                      <option value="Mabalacat" data-zipcode="2010" @if($billing->city == 'Mabalacat') selected @endif>Mabalacat</option>
				                      <option value="Bamban" data-zipcode="2317" @if($billing->city == 'Bamban') selected @endif>Bamban</option>
				                      <option value="Magalang" data-zipcode="2011" @if($billing->city == 'Magalang') selected @endif>Magalang</option>
				                    </select>
		                 		</td>
						    </tr>
						    <tr>
						      	<td>Zip Code</td>
						      	<td><input type="text" class="form-control" id="billing-zipcode" name="billing_zipcode" value="{{ $billing->zipcode or old('billing_zipcode') }}" ></td>
						    </tr>
						    <tr>
						      	<td>Country</td>
						      	<td>
						      		<select class="form-control" id="billing-country" name="billing_country">
		                    			<option value="Philippines" selected="true" readonly>Philippines</option>
		                  			</select>
						      	</td>
						    </tr>
					  	</tbody>
					</table>
    			</div>
            	<button type="submit" name="submit" class="btn btn-lg btn-primary">Save Changes</button>
            	<a href="/account"  class="btn btn-default btn-lg">Cancel</a>
  		  </div>
        </form>
    </div>
  	@include('account.links-login')
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#shipping-city').change(function(){
            $('#shipping-zipcode').val($(this).find(':selected').attr('data-zipcode'));
        });

        $('#billing-city').change(function(){
            $('#billing-zipcode').val($(this).find(':selected').attr('data-zipcode'));
        });
    });
</script>
@endsection



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

  	 <!--Right Part Start -->
        <aside id="column-right" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">Bestsellers</h3>
          <div class="side-item">
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/apple_cinema_30-50x75.jpg" alt="Brand Fashion Cotton T-Shirt" title="Brand Fashion Cotton T-Shirt" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Brand Fashion Cotton T-Shirt</a></h4>
                <p class="price"><span class="price-new">$110.00</span> <span class="price-old">$122.00</span> <span class="saving">-10%</span></p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/iphone_1-50x75.jpg" alt="iPhone5" title="iPhone5" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">iPhone5</a></h4>
                <p class="price"> $123.20 </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/macbook_1-50x75.jpg" alt="Ideapad Yoga 13-59341124 Laptop" title="Ideapad Yoga 13-59341124 Laptop" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Ideapad Yoga 13-59341124 Laptop</a></h4>
                <p class="price"> $2.00 </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/sony_vaio_1-50x75.jpg" alt="Xitefun Causal Wear Fancy Shoes" title="Xitefun Causal Wear Fancy Shoes" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Xitefun Causal Wear Fancy Shoes</a></h4>
                <p class="price"> <span class="price-new">$902.00</span> <span class="price-old">$1,202.00</span> <span class="saving">-25%</span> </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/FinePix-Long-Zoom-Camera-50x75.jpg" alt="FinePix S8400W Long Zoom Camera" title="FinePix S8400W Long Zoom Camera" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">FinePix S8400W Long Zoom Camera</a></h4>
                <p class="price">$122.00</p>
              </div>
            </div>
          </div>
          <div class="list-group">
            <h3 class="subtitle">Custom Content</h3>
            <p>This is a CMS block edited from admin. You can insert any content (HTML, Text, Images) Here. </p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
          </div>
          <h3 class="subtitle">Specials</h3>
          <div class="side-item">
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/macbook_pro_1-50x75.jpg" alt=" Strategies for Acquiring Your Own Laptop " title=" Strategies for Acquiring Your Own Laptop " class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Strategies for Acquiring Your Own Laptop</a></h4>
                <p class="price"> <span class="price-new">$1,400.00</span> <span class="price-old">$1,900.00</span> <span class="saving">-26%</span> </p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/samsung_tab_1-50x75.jpg" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Aspire Ultrabook Laptop</a></h4>
                <p class="price"> <span class="price-new">$230.00</span> <span class="price-old">$241.99</span> <span class="saving">-5%</span> </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/apple_cinema_30-50x75.jpg" alt="Brand Fashion Cotton T-Shirt" title="Brand Fashion Cotton T-Shirt" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="http://demo.harnishdesign.net/opencart/marketshop/v1/index.php?route=product/product&amp;product_id=42">Brand Fashion Cotton T-Shirt</a></h4>
                <p class="price"> <span class="price-new">$110.00</span> <span class="price-old">$122.00</span> <span class="saving">-10%</span> </p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/nikon_d300_1-50x75.jpg" alt="Digital Camera for Elderly" title="Digital Camera for Elderly" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Digital Camera for Elderly</a></h4>
                <p class="price"> <span class="price-new">$92.00</span> <span class="price-old">$98.00</span> <span class="saving">-6%</span> </p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/nikon_d300_5-50x75.jpg" alt="Hair Care Products" title="Hair Care Products" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Hair Care Products</a></h4>
                <p class="price"> <span class="price-new">$66.80</span> <span class="price-old">$90.80</span> <span class="saving">-27%</span> </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/macbook_air_1-50x75.jpg" alt="Laptop Silver black" title="Laptop Silver black" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Laptop Silver black</a></h4>
                <p class="price"> <span class="price-new">$1,142.00</span> <span class="price-old">$1,202.00</span> <span class="saving">-5%</span> </p>
              </div>
            </div>
          </div>
        </aside>
        <!--Right Part End -->
  	
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

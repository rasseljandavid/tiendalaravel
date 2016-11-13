@extends('layouts.app')

@section('metainfo')
	<title>Checkout : Tienda -Your First Online Grocery in the Philippines</title>
  <meta name="description" content="Checkout : Tienda - Your First Online Grocery in the Philippines">
@endsection

@section('content')
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="/cart/show">Shopping Cart</a></li>
        <li><a href="/cart/checkout">Checkout</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">Checkout</h1>
          <form id="submit-order" method="POST" action="{{url('/cart/preprocess')}}" class="form">
            <div class="row">
              <div class="col-sm-4">
                @if( Auth::check() )
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-user"></i> {{ Auth::user()->getFullname() }}
                            <span class="pull-right"><a href="{{ url('/account/edit') }}">edit</a></span>
                        </h4>
                      </div>
                        <div class="panel-body">
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>Email</td>
                                <td>{{ Auth::user()->email }}</td>
                              </tr>
                              <tr>
                                <td>Contact Number</td>
                                <td>{{ Auth::user()->contact }}</td>
                              </tr>
                              <tr>
                                <td colspan="2"><b>Shipping & Billing Address</b></td>
                                @php $shipping = Auth::user()->getShippingAddress(); @endphp
                              </tr>
                              <tr>
                                <td>Street Address</td>
                                <td>{{ $shipping->address_one }}</td>
                              </tr>
                              <tr>
                                <td>City</td>
                                <td>{{ $shipping->city }}, {{ $shipping->zipcode }}</td>
                              </tr>
                              <tr>
                                <td>Country</td>
                                <td>{{ $shipping->address_one }}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    </div>
                @else
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-sign-in"></i> Create an Account or Login</h4>
                    </div>
                      <div class="panel-body">
                        <div class="radio">
                          <label>
                            <input type="radio" value="register" name="account">
                            Register Account</label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" value="returning" name="account" checked="checked">
                            Returning Customer</label>
                        </div>
                      </div>
                  </div>
                  <div id="returning">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-user"></i> Returning Customer</h4>
                      </div>
                        <div class="panel-body">
                          <p><strong>I am a returning customer</strong></p>
                          <div class="form-group">
                            <label class="control-label" for="input-email">E-Mail Address</label>
                            <input type="text" name="login-email" value="" placeholder="E-Mail Address" id="input-email" class="form-control" />
                          </div>
                          <div class="form-group">
                            <label class="control-label" for="input-password">Password</label>
                            <input type="password" name="login-password" value="" placeholder="Password" id="input-password" class="form-control" />
                            <br />
                            <a href="{{url('/password/reset')}}">Forgotten Password</a></div>
                        </div>
                    </div>
                  </div>
                  <div id="registration">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
                      </div>
                        <div class="panel-body">
                          <fieldset id="account">
                            <div class="form-group required">
                              <label for="input-payment-firstname" class="control-label">First Name</label>
                              <input type="text" class="form-control" id="input-payment-firstname" placeholder="First Name" value="" name="firstname">
                            </div>
                            <div class="form-group required">
                              <label for="input-payment-lastname" class="control-label">Last Name</label>
                              <input type="text" class="form-control" id="input-payment-lastname" placeholder="Last Name" value="" name="lastname">
                            </div>
                            <div class="form-group required">
                              <label for="input-payment-email" class="control-label">E-Mail</label>
                              <input type="text" class="form-control" id="input-payment-email" placeholder="E-Mail" value="" name="email">
                            </div>
                            <div class="form-group required">
                              <label for="input-payment-telephone" class="control-label">Contact Number</label>
                              <input type="text" class="form-control" id="input-payment-telephone" placeholder="Telephone" value="" name="contact">
                            </div>
                          </fieldset>
                        </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-book"></i> Your Address</h4>
                      </div>
                        <div class="panel-body">
                          <fieldset id="address" class="required">
                            <div class="form-group required">
                              <label for="input-payment-address-1" class="control-label">Street #, Village, Apartment Bldg.</label>
                              <input type="text" class="form-control" id="input-payment-address-1" placeholder="Street #, Village, Apartment Bldg." value="" name="address_one">
                            </div>
                            <div class="form-group">
                              <label for="input-city" class="control-label">City / Municipality</label>
                              <select class="form-control" id="input-city" name="city">
                                <option value=""> --- Please Select --- </option>
                                <option value="Angeles" data-zipcode="2009">Angeles</option>
                                <option value="Mabalacat" data-zipcode="2010">Mabalacat</option>
                                <option value="Bamban" data-zipcode="2317">Bamban</option>
                                <option value="Magalang" data-zipcode="2011">Magalang</option>
                              </select>
                            </div>
                            <div class="form-group required">
                              <label for="input-zipcode" class="control-label">Zip Code</label>
                              <input type="text" class="form-control" id="input-zipcode" placeholder="Zip Code" value="" name="zipcode">
                            </div>
                            <div class="form-group required">
                              <label for="input-country" class="control-label">Country</label>
                              <select class="form-control" id="input-country" name="country">
                                <option value="Philippines" selected="true" readonly>Philippines</option>
                              </select>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" checked="checked" value="1" name="shipping_address" disabled>
                                My delivery and billing addresses are the same.</label>
                            </div>
                          </fieldset>
                        </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-book"></i> Password</h4>
                      </div>
                      <div class="panel-body">
                        <fieldset id="password-panel" class="required">
                          <div class="form-group required">
                            <label for="input-password-2" class="control-label">Password</label>
                            <input type="password" class="form-control" id="input-password-2" placeholder="Password" value="" name="password">
                          </div>
                          <div class="form-group required">
                            <label for="input-confirm" class="control-label">Password Confirm</label>
                            <input type="password" class="form-control" id="input-confirm" placeholder="Password Confirm" value="" name="password_confirmation">
                          </div>
                          <div class="form-group text-center">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Subscribe</label>
                              <div class="col-sm-10">
                                <label class="radio-inline">
                                  <input type="radio" value="1" name="newsletter">
                                  Yes</label>
                                <label class="radio-inline">
                                  <input type="radio" checked="checked" value="0" name="newsletter">
                                  No</label>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                  </div>
                  
                @endif
              </div>
              <div class="col-sm-8">
                  <div class="col-sm-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
                      </div>
                        <div class="panel-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="checkout-table-res">
                              <thead>
                                <tr>
                                  <td class="text-center">Image</td>
                                  <td class="text-left">Product Name</td>
                                  <td class="text-left">Quantity</td>
                                  <td class="text-right">Unit Price</td>
                                  <td class="text-right">Total</td>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach($cart->orderitems as $oi)
                                  <?php $oiProd =  $oi->getProduct(); ?>
                                  <tr>
                                    <td class="text-center"><a href="{{$oiProd->slugLink()}}"><img style="max-width:50px;max-height:75px;width:100%;height:auto;" src="/image/product/{{ $oiProd->id.'.jpg' }}" alt="{{ $oiProd->title }}" title="{{ $oiProd->title }}" class="img-thumbnail" /></a></td>
                                    <td class="text-left"><a href="{{$oiProd->slugLink()}}">{{$oiProd->title}}</a><br />
                                      <small>{{$oiProd->reward}}</small></td>
                                    <td class="text-left">
                                        <div class="input-group btn-block quantity">
                                        @include('cart._itemaction')
                                        </div>
                                    </td>
                                    <td class="text-right">₱{{$oi->price}}</td>
                                    <td class="text-right">₱{{ ($oi->quantity * $oi->price) }}</td>
                                  </tr>
                              @endforeach
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
                                  <td class="text-right">₱{{$cart->total}}</td>
                                </tr>
                                <tr>
                                  <td class="text-right" colspan="4"><strong>Flat Shipping Rate:</strong></td>
                                  <td class="text-right">₱{{$cart->shipping_fee}}</td>
                                </tr>
                                <tr>
                                  <td class="text-right" colspan="4"><strong>Eco Tax <!-- (-2.00) -->:</strong></td>
                                  <td class="text-right">₱N/A</td>
                                </tr>
                                <tr>
                                  <td class="text-right" colspan="4"><strong>VAT <!-- (20%) -->:</strong></td>
                                  <td class="text-right">₱N/A</td>
                                </tr>
                                <tr>
                                  <td class="text-right" colspan="4"><strong>Total:</strong></td>
                                  <td class="text-right">₱{{$cart->grand_total}}</td>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your Order</h4>
                      </div>
                        <div class="panel-body">
                          <textarea rows="4" class="form-control" id="confirm_comment" name="comment"></textarea>
                          <br>
                          <label class="control-label" for="confirm_agree">
                            <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
                            <span>I have read and agree to the <a class="agree" target="_blank" href="/terms-and-conditions"><b>Terms &amp; Conditions</b></a></span> </label>
                          <div class="buttons">
                            <div class="pull-right">
                              <input type="submit" class="btn btn-primary" id="button-confirm" value="Confirm Order">
                              <!-- <input type="submit" name="submit" value="Submit"> -->
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!--Middle Part End -->
      </div>
    </div>

@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    $('#input-city').change(function(){
        $('#input-zipcode').val($(this).find(':selected').attr('data-zipcode'));
    });

    @if( !Auth::check() )
      $('input[type=radio][name=account]').change(function() {
          if (this.value == 'register') {

            $('#input-email').removeAttr('required');
            $('#input-password').removeAttr('required');

            $('#input-payment-firstname').attr('required', 'required');
            $('#input-payment-lastname').attr('required', 'required');
            $('#input-payment-email ').attr('required', 'required');
            $('#input-payment-telephone').attr('required', 'required');
            $('#input-payment-address-1').attr('required', 'required');
            $('#input-city').attr('required', 'required');
            $('#input-zipcode').attr('required', 'required');
            $('#input-country').attr('required', 'required');
            $('#input-password-2').attr('required', 'required');
            $('#input-confirm').attr('required', 'required');

            $('#returning').slideUp();
            $('#registration').slideDown();
          }
          
          if (this.value == 'returning') {

            $('#input-payment-firstname').removeAttr('required');
            $('#input-payment-lastname').removeAttr('required');
            $('#input-payment-email ').removeAttr('required');
            $('#input-payment-telephone').removeAttr('required');
            $('#input-payment-address-1').removeAttr('required');
            $('#input-city').removeAttr('required');
            $('#input-zipcode').removeAttr('required');
            $('#input-country').removeAttr('required');
            $('#input-password-2').removeAttr('required');
            $('#input-confirm').removeAttr('required');

            $('#input-email').attr('required', 'required');
            $('#input-password').attr('required', 'required');

            $('#registration').slideUp();
            $('#returning').slideDown();
          }
      });
      $('input[type=radio][name=account]').trigger('change');
    @endif

  });
</script>
@endsection
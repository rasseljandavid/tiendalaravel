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
          <div class="row">
            <div class="col-sm-4">
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
                            <input type="radio" value="returning" name="account">
                            Returning Customer</label>
                        </div>
                  </div>
              </div>
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
                            <label for="input-payment-telephone" class="control-label">Telephone</label>
                            <input type="text" class="form-control" id="input-payment-telephone" placeholder="Telephone" value="" name="telephone">
                          </div>
                          <div class="form-group">
                            <label for="input-payment-fax" class="control-label">Fax</label>
                            <input type="text" class="form-control" id="input-payment-fax" placeholder="Fax" value="" name="fax">
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
                          <div class="form-group">
                            <label for="input-payment-company" class="control-label">Company</label>
                            <input type="text" class="form-control" id="input-payment-company" placeholder="Company" value="" name="company">
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-address-1" class="control-label">Address 1</label>
                            <input type="text" class="form-control" id="input-payment-address-1" placeholder="Address 1" value="" name="address_1">
                          </div>
                          <div class="form-group">
                            <label for="input-payment-address-2" class="control-label">Address 2</label>
                            <input type="text" class="form-control" id="input-payment-address-2" placeholder="Address 2" value="" name="address_2">
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-city" class="control-label">City</label>
                            <input type="text" class="form-control" id="input-payment-city" placeholder="City" value="" name="city">
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-postcode" class="control-label">Post Code</label>
                            <input type="text" class="form-control" id="input-payment-postcode" placeholder="Post Code" value="" name="postcode">
                          </div>
              
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" checked="checked" value="1" name="shipping_address">
                              My delivery and billing addresses are the same.</label>
                          </div>
                        </fieldset>
                      </div>
              </div>
            </div>
            <div class="col-sm-8">
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
                    </div>
                      <div class="panel-body">
                        <div class="table-responsive">
                          <table class="table table-bordered">
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
                                <td class="text-right">₱N/A</td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Eco Tax (-2.00):</strong></td>
                                <td class="text-right">₱N/A</td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="4"><strong>VAT (20%):</strong></td>
                                <td class="text-right">₱N/A</td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Total:</strong></td>
                                <td class="text-right">₱N/A</td>
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
                        <textarea rows="4" class="form-control" id="confirm_comment" name="comments"></textarea>
                        <br>
                        <label class="control-label" for="confirm_agree">
                          <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
                          <span>I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a></span> </label>
                        <div class="buttons">
                          <div class="pull-right">
                            <input type="button" class="btn btn-primary" id="button-confirm" value="Confirm Order">
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>

@endsection
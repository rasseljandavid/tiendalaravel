@extends('layouts.app')

@section('metainfo')
    <title>Register : Tienda -Your First Online Grocery in the Philippines</title>
  <meta name="description" content="Register : Tienda -Your First Online Grocery in the Philippines">
@endsection

@section('content')
    
    <div class="container">
    @include('errors.validation')
    <!-- Breadcrumb Start-->
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="login.html">Account</a></li>
        <li><a href="register.html">Register</a></li>
    </ul>
    <!-- Breadcrumb End-->
    <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
        <h1 class="title">Register Account</h1>
        <p>If you already have an account with us, please login at the <a href="login.html">Login Page</a>.</p>
        <form class="form-horizontal" role="form" action="{{ url('/register') }}" method="POST">
            {{ csrf_field() }}
            <fieldset id="account">
                  <legend>Your Personal Details</legend>
                <div style="display: none;" class="form-group required">
                    <label class="col-sm-2 control-label">Customer Group</label>
                    <div class="col-sm-10">
                      <div class="radio">
                        <label>
                          <input type="radio" checked="checked" value="1" name="customer_group_id">
                          Default</label>
                      </div>
                    </div>
                </div>
                <div class="form-group required">
                    <label for="input-firstname" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="input-firstname" placeholder="First Name" value="" name="firstname">
                    </div>
                </div>
                <div class="form-group required">
                    <label for="input-lastname" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="input-lastname" placeholder="Last Name" value="" name="lastname">
                    </div>
                </div>
                <div class="form-group required">
                    <label for="input-email" class="col-sm-2 control-label">E-Mail</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="" name="email">
                    </div>
                </div>
                <div class="form-group required">
                    <label for="input-telephone" class="col-sm-2 control-label">Contact Number</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="input-telephone" placeholder="Cellphone/Telephone #" value="" name="contact">
                    </div>
                </div>
            </fieldset>
            <fieldset id="address">
              <legend>Your Address</legend>
              <div class="form-group required">
                <input type="hidden" name="is_shipping" value="1">
                <label for="input-address-1" class="col-sm-2 control-label">Street #, Village, Apartment Bldg.</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-address-1" placeholder="Street #, Village, Apartment Bldg." value="" name="address_one">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-city" class="col-sm-2 control-label">City / Municipality</label>
                <div class="col-sm-10">
                  <select class="form-control" id="input-city" name="city">
                    <option value=""> --- Please Select --- </option>
                    <option value="Angeles" data-zipcode="2009">Angeles</option>
                    <option value="Mabalacat" data-zipcode="2010">Mabalacat</option>
                    <option value="Bamban" data-zipcode="2317">Bamban</option>
                    <option value="Magalang" data-zipcode="2011">Magalang</option>
                  </select>
                </div>
              </div>
                
              <div class="form-group required">
                <label for="input-zipcode" class="col-sm-2 control-label">Zip Code</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-zipcode" placeholder="Zip Code" value="" name="zipcode">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-country" class="col-sm-2 control-label">Country</label>
                <div class="col-sm-10">
                  <select class="form-control" id="input-country" name="country">
                    <option value="Philippines" selected="true" readonly>Philippines</option>
                  </select>
                </div>
              </div>
              
            </fieldset>
            <fieldset>
              <legend>Your Password</legend>
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-password" placeholder="Password" value="" name="password">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-confirm" class="col-sm-2 control-label">Password Confirm</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-confirm" placeholder="Password Confirm" value="" name="password_confirmation">
                </div>
              </div>
            </fieldset>
            <fieldset>
              <legend>Newsletter</legend>
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
            </fieldset>
            <div class="buttons">
              <div class="pull-right">
                <input type="checkbox" value="1" name="agree">
                &nbsp;I have read and agree to the <a class="agree" href="#"><b>Privacy Policy</b></a> &nbsp;
                <input type="submit" class="btn btn-primary" value="Continue">
              </div>
            </div>
          </form>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->
        <aside id="column-right" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">Account</h3>
          <div class="list-group">
            <ul class="list-item">
              <li><a href="login.html">Login</a></li>
              <li><a href="register.html">Register</a></li>
              <li><a href="#">Forgotten Password</a></li>
              <li><a href="#">My Account</a></li>
              <li><a href="#">Address Books</a></li>
              <li><a href="wishlist.html">Wish List</a></li>
              <li><a href="#">Order History</a></li>
              <li><a href="#">Downloads</a></li>
              <li><a href="#">Reward Points</a></li>
              <li><a href="#">Returns</a></li>
              <li><a href="#">Transactions</a></li>
              <li><a href="#">Newsletter</a></li>
              <li><a href="#">Recurring payments</a></li>
            </ul>
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
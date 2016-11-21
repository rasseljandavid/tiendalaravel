@extends('layouts.app')

@section('content')
    
    <div class="container">
    <!-- Breadcrumb Start-->
    <ul class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{ url('/login') }}">Account</a></li>
        <li><a href="{{ url('/register') }}">Register</a></li>
    </ul>
    <!-- Breadcrumb End-->
    <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
        <h1 class="title">Register Account</h1>
        <p>If you already have an account with us, please login at the <a href="{{ url('/login') }}">Login Page</a>.</p>
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
                      <input type="text" class="form-control" id="input-firstname" placeholder="First Name" value="{{old('firstname')}}" name="firstname" required>
                    </div>
                </div>
                <div class="form-group required">
                    <label for="input-lastname" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="input-lastname" placeholder="Last Name" value="{{old('lastname')}}" name="lastname" required>
                    </div>
                </div>
                <div class="form-group required">
                    <label for="input-email" class="col-sm-2 control-label">E-Mail</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="{{old('email')}}" name="email" required>
                    </div>
                </div>
                <div class="form-group required">
                    <label for="input-telephone" class="col-sm-2 control-label">Contact Number</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="input-telephone" placeholder="Cellphone/Telephone #" value="{{old('contact')}}" name="contact" required>
                    </div>
                </div>
            </fieldset>

            <fieldset id="address">
              <legend>Your Address</legend>
              <div class="shipping-address address-container">
                <h3>Shipping Address</h3>
                <div class="form-group required">
                  <label for="input-ship-to" class="col-sm-2 control-label">Ship To:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-ship-to" placeholder="Full Name" value="{{old('to.ship')}}" name="to[ship]">
                  </div>
                </div>
                <div class="form-group required">
                  <label for="input-address-1" class="col-sm-2 control-label">Street #, Village, Apartment Bldg.</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-address-1" placeholder="Street #, Village, Apartment Bldg." value="{{old('address_one.ship')}}" name="address_one[ship]">
                  </div>
                </div>
                <div class="form-group required">
                  <label for="input-city" class="col-sm-2 control-label">City / Municipality</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="input-city" name="city[ship]">
                      <option value=""> --- Please Select --- </option>
                      <option value="Angeles" data-zipcode="2009" @if(old('city.ship') == "Angeles") selected="selected" @endif>Angeles</option>
                      <option value="Mabalacat" data-zipcode="2010" @if(old('city.ship') == "Mabalacat") selected="selected" @endif>Mabalacat</option>
                      <option value="Bamban" data-zipcode="2317" @if(old('city.ship') == "Bamban") selected="selected" @endif>Bamban</option>
                      <option value="Magalang" data-zipcode="2011" @if(old('city.ship') == "Magalang") selected="selected" @endif>Magalang</option>
                    </select>
                  </div>
                </div>
                  
                <div class="form-group required">
                  <label for="input-zipcode" class="col-sm-2 control-label">Zip Code</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-zipcode" placeholder="Zip Code" value="{{old('zipcode.ship')}}" name="zipcode[ship]">
                  </div>
                </div>
                <div class="form-group required">
                  <label for="input-country" class="col-sm-2 control-label">Country</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="input-country" name="country[ship]">
                      <option value="Philippines" selected="true" readonly>Philippines</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="checkbox">
                <label>
                  <input type="checkbox" name="checkbox-same-address" value="1" checked="checked" id="checkbox-same-address">
                  My Shipping and Billing address are the same.</label>
              </div>

              <div class="billing-address address-container">
                <h3>Billing Address</h3>
                <div class="form-group required">
                  <label for="input-bill-to" class="col-sm-2 control-label">Bill To:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-bill-to" placeholder="Full Name" value="{{old('to.bill')}}" name="to[bill]">
                  </div>
                </div>
                <div class="form-group required">
                  <label for="input-address-1" class="col-sm-2 control-label">Street #, Village, Apartment Bldg.</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-address-1" placeholder="Street #, Village, Apartment Bldg." value="{{old('address_one.bill')}}" name="address_one[bill]">
                  </div>
                </div>
                <div class="form-group required">
                  <label for="input-city" class="col-sm-2 control-label">City / Municipality</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="input-city" name="city[bill]">
                      <option value=""> --- Please Select --- </option>
                      <option value="Angeles" data-zipcode="2009" @if(old('city.bill') == "Angeles") selected="selected" @endif>Angeles</option>
                      <option value="Mabalacat" data-zipcode="2010" @if(old('city.bill') == "Mabalacat") selected="selected" @endif>Mabalacat</option>
                      <option value="Bamban" data-zipcode="2317" @if(old('city.bill') == "Bamban") selected="selected" @endif>Bamban</option>
                      <option value="Magalang" data-zipcode="2011" @if(old('city.bill') == "Magalang") selected="selected" @endif>Magalang</option>
                    </select>
                  </div>
                </div>
                  
                <div class="form-group required">
                  <label for="input-zipcode" class="col-sm-2 control-label">Zip Code</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-zipcode" placeholder="Zip Code" value="{{old('zipcode.bill')}}" name="zipcode[bill]">
                  </div>
                </div>
                <div class="form-group required">
                  <label for="input-country" class="col-sm-2 control-label">Country</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="input-country" name="country[bill]">
                      <option value="Philippines" selected="true" readonly>Philippines</option>
                    </select>
                  </div>
                </div>
              </div>
            </fieldset>
            <br>
            <fieldset>
              <legend>Your Password</legend>
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-password" placeholder="Password" value="" name="password" required>
                </div>
              </div>
              <div class="form-group required">
                <label for="input-confirm" class="col-sm-2 control-label">Password Confirm</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-confirm" placeholder="Password Confirm" value="" name="password_confirmation" required>
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
                <input type="checkbox" value="1" name="agree" required />
                &nbsp;I have read and agree to the <a class="agree" href="/privacy-policy" target="_blank"><b>Privacy Policy</b></a> &nbsp;
                <input type="submit" class="btn btn-primary" value="Continue">
              </div>
            </div>
          </form>
        </div>
        <!--Middle Part End -->
        @include('account.links')
      </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){

      $('.shipping-address #input-city').change(function(){
        $('.shipping-address #input-zipcode').val($(this).find(':selected').attr('data-zipcode'));
      });
      
      $('.billing-address #input-city').change(function(){
        $('.billing-address #input-zipcode').val($(this).find(':selected').attr('data-zipcode'));
      });

      $('#checkbox-same-address').change(function(){
        if($(this).is(':checked')){
          $(".billing-address.address-container").slideUp(300);
        }else{
          $(".billing-address.address-container").slideDown(300);
        }
      });
      
      @if(old('checkbox-same-address'))
        $('#checkbox-same-address').prop("checked", true);
      @else
        $('#checkbox-same-address').prop("checked", false);
      @endif

      $('#checkbox-same-address').change();
    
    });
</script>
@endsection
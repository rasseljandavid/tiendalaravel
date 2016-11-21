@extends('layouts.app')


@section('content')
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="login.html">Account</a></li>
        <li><a href="login.html">Login</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <h1 class="title">Account Login</h1>
          <div class="row">
            <div class="col-sm-6">
              <h2 class="subtitle">New Customer</h2>
              <p><strong>Register Account</strong></p>
              <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
              <a href="/register" class="btn btn-primary">Continue</a> </div>
            <div class="col-sm-6">
              <h2 class="subtitle">Returning Customer</h2>
              <form method="POST" action="{{ url('/login') }}" class="form">
                {{ csrf_field() }}
                <p><strong>I am a returning customer</strong></p>
                <div class="form-group">
                  <label class="control-label" for="input-email">E-Mail Address</label>
                  <input type="text" name="email" value="" placeholder="E-Mail Address" id="input-email" class="form-control" />
                </div>
                <div class="form-group">
                  <label class="control-label" for="input-password">Password</label>
                  <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" />
                  <br />
                  <a href="{{url('/password/reset')}}">Forgotten Password</a></div>
                <!-- <input type="submit" value="Login" class="btn btn-primary" /> -->
                <input type="submit" name="submit" value="Login" class="btn btn-primary">
              </form>
            </div>
          </div>
        </div>
        <!--Middle Part End -->
        @include('account.links')
      </div>
    </div>
@endsection
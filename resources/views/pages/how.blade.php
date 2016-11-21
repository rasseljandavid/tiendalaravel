@extends('layouts.app')


@section('content')
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="/how-it-works">How It Works</a></li>
      </ul>
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-xs-12">
            <h1 class="title">How It Works</h1>
            <div >
              <h2><strong>1. Browse</strong></h2>
              <p style="font-size: 1.2em;">
                  Browse Tienda.ph like it&rsquo;s your favorite magazine. We have over thousand items available - and counting, all at the lowest possible price.
              </p>

              <h2><strong>2. Choose</strong></h2>
              <p style="font-size: 1.2em;">
              Something caught your eye? Add it to your cart and continue shopping until you have all of the items you want. The item you want is not on our list? <a href="/contact-us">Tell us!</a></p>

              <h2><strong>3. Checkout</strong></h2>
              <p style="font-size: 1.2em;">
              Done shopping and ready to seal the deal? Simply click on Checkout and fill-in the necessary details needed for us to find you. You can checkout as a guest if you are in a hurry, but we highly recommend registering on Tienda so that we can save your preferences and help you browse faster on your next visit!</p>

              <h2><strong>4. Our Turn!</strong></h2>
              <p style="font-size: 1.2em;">
              Once we received your order we will carefully pack your goods and deliver them right at your doorstep on the time and date of your preference!</p>

              <h2><strong>5. Payment</strong></h2>
              <p style="font-size: 1.2em;">
              Our friendly team will gladly accept your payment once the goods are delivered to your satisfaction.</p>
            </div>
        </div>
      </div>
    </div>
@endsection
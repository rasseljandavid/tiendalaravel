@extends('layouts.app')

@section('metainfo')
	<title>Contact Us : Tienda -Your First Online Grocery in the Philippines</title>
  <meta name="description" content="Contact Us : Tienda -Your First Online Grocery in the Philippines">
@endsection

@section('content')
  
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="/contact-us">Contact Us</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <h1 class="title">Contact Us</h1>
          <h3 class="subtitle">Our Location</h3>
          <div class="row">
            <div class="col-sm-3"><img src="/image/logo.png" alt="MarketShop Template" title="MarketShop Template" class="img-thumbnail" /></div>
            <div class="col-sm-3"><strong>TIENDA ENTERPRISES</strong><br />
              <address>
              Lot 1 Blk 20 Mauaque Resettlement,<br />
              Mabalacat City,<br />
              Pampanga,<br />
              Philippines
              </address>
            </div>
            <div class="col-sm-3"><strong>Mobile</strong><br>
              +63 9258166813<br />
              <br />
              <strong>Phone</strong><br>
              +63 045 3085345</div>
            <div class="col-sm-3"> <strong>Email</strong><br />
              hello@tienda.ph<br />
              <br />
              <strong>Note</strong><br />
              You can always contact us via this contact form. We will require 1 business day to reply (at worst). </div>
          </div>
          <form class="form-horizontal">
            <fieldset>
              <h3 class="subtitle">Send us an Email</h3>
              <div class="form-group required">
                <label class="col-md-2 col-sm-3 control-label" for="input-name">Your Name</label>
                <div class="col-md-10 col-sm-9">
                  <input type="text" name="name" value="" id="input-name" class="form-control" />
                </div>
              </div>
              <div class="form-group required">
                <label class="col-md-2 col-sm-3 control-label" for="input-email">E-Mail Address</label>
                <div class="col-md-10 col-sm-9">
                  <input type="text" name="email" value="" id="input-email" class="form-control" />
                </div>
              </div>
              <div class="form-group required">
                <label class="col-md-2 col-sm-3 control-label" for="input-enquiry">Enquiry</label>
                <div class="col-md-10 col-sm-9">
                  <textarea name="enquiry" rows="10" id="input-enquiry" class="form-control"></textarea>
                </div>
              </div>
            </fieldset>
            <div class="buttons">
              <div class="pull-right">
                <input class="btn btn-primary" type="submit" value="Submit" />
              </div>
            </div>
          </form>
        </div>
        <aside id="column-right" class="col-sm-3 hidden-xs">
          <div class="list-group">
            <h2 class="subtitle">Map</h2>
            <p> You're free to come to our office from Monday to Saturday at 8:00am to 5:00pm.</p>
          </div>
          <div class="banner owl-carousel">
            <div class="item"> <a href="#"><img src="image/banner/small-banner1-265x350.jpg" alt="small banner" class="img-responsive" /></a> </div>
            <div class="item"> <a href="#"><img src="image/banner/small-banner-265x350.jpg" alt="small banner1" class="img-responsive" /></a> </div>
          </div>
        </aside>
        <!--Middle Part End -->
      </div>
    </div>
    
@endsection
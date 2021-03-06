@extends('layouts.app')

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
            <div class="col-sm-3">
            <a href="/"><img src="/image/logo.png" alt="Tienda - Online Grocery" title="Tienda - Online Grocery" class="img-thumbnail" /></a></div>
            <div class="col-sm-3"><strong>TIENDA ENTERPRISES</strong><br />
              <address>
              Lot 2 Blk 20 18th Street <br /> Mauaque Resettlement,<br />
              Mabalacat Pampanga,<br />
              Philippines
              </address>
            </div>
            <div class="col-sm-3"><strong>Mobile</strong><br>
              <a href="tel:639258166813">+63 9258166813</a><br />
              <br />
              <strong>Phone</strong><br>
              <a href="tel:63453085345">+63 045 3085345</a></div>
            <div class="col-sm-3"> <strong>Email</strong><br />
              <a href="mailto:hello@tienda.ph">hello@tienda.ph</a><br />
              <br />
              <strong>Note</strong><br />
              You can always contact us via this contact form. We will require 1 business day to reply (at worst). </div>
          </div>
          <form id="contact_form" method="POST" class="contact-form">
            {{ csrf_field() }}
            <fieldset>
              <h3 class="subtitle">Send us an Email</h3>
              <div class="form-group required">
                <label class="col-md-2 col-sm-3 control-label" for="input-name">Your Name</label>
                <div class="col-md-10 col-sm-9">
                  <input required type="text" name="name" value="" id="input-name" class="form-control" />
                </div>
              </div>
              <div class="form-group required">
                <label class="col-md-2 col-sm-3 control-label" for="input-email">E-Mail Address</label>
                <div class="col-md-10 col-sm-9">
                  <input required type="email" name="email" value="" id="input-email" class="form-control" />
                </div>
              </div>
              <div class="form-group required">
                <label class="col-md-2 col-sm-3 control-label" for="input-enquiry">Enquiry</label>
                <div class="col-md-10 col-sm-9">
                  <textarea required name="message" rows="10" id="input-enquiry" class="form-control"></textarea>

                </div>
              </div>
            </fieldset>
             <div id="messages" class="col-md-12" style="margin-top: 20px; text-align: center;"></div>
            <div class="buttons">
              <div class="pull-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>

          </form>
        </div>
        <aside id="column-right" class="col-sm-3 hidden-xs">
          <div class="list-group">
            <h2 class="subtitle">Map</h2>
            <p> You're free to come to our office from Monday to Saturday at 8:00am to 5:00pm.</p>
          </div>

           <div id="map" style="height: 350px" class="google-map"> </div>
          </div>
        </aside>
        <!--Middle Part End -->
      </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyAXBWuKV-9XMaG-GmZVVnAeItXgcAoK-ds"></script>
@endsection

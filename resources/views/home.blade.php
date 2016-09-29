@extends('layouts.app')

@section('metainfo')
	<link href="image/favicon.png" rel="icon" />
	<title>Tienda - Your First Online Grocery in the Philippines</title>
	<meta name="description" content="Tienda - Your First Online Grocery in the Philippines">
@endsection

@section('content')
    
<div class="container">
  <div class="row">
    <!--Middle Part Start-->
    <div id="content" class="col-xs-12">
      <!-- Slideshow Start-->
      <div class="slideshow single-slider owl-carousel">
        <div class="item"> <a href="#"><img class="img-responsive" src="image/slider/banner-2.jpg" alt="banner 2" /></a> </div>
        <div class="item"> <a href="#"><img class="img-responsive" src="image/slider/banner-1.jpg" alt="banner 1" /></a> </div>
      </div>
      <!-- Slideshow End-->

      <!-- Banner Start-->
      <div class="marketshop-banner">
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="image/banner/sample-banner-3-300x300.jpg" alt="Sample Banner 2" title="Sample Banner 2" /></a></div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="image/banner/sample-banner-1-300x300.jpg" alt="Sample Banner" title="Sample Banner" /></a></div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="image/banner/sample-banner-2-300x300.jpg" alt="Sample Banner 3" title="Sample Banner 3" /></a></div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="image/banner/sample-banner-4-300x300.jpg" alt="Sample Banner 4" title="Sample Banner 4" /></a></div>
        </div>
      </div>
      <!-- Banner End-->

      <!-- Product Tab Start -->
      {{-- @include('tabulars.simple', ['featured'=>$featured, 'latest'=>$latest]) --}}
      <!-- Product Tab End -->


      <!-- Banner Start -->
      <div class="marketshop-banner">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="#"><img src="image/banner/sample-banner-4-600x250.jpg" alt="2 Block Banner" title="2 Block Banner" /></a></div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="#"><img src="image/banner/sample-banner-5-600x250.jpg" alt="2 Block Banner 1" title="2 Block Banner 1" /></a></div>
        </div>
      </div>
      <!-- Banner End -->



      <!-- Categories Product Slider Start-->
      {{-- @include('tabulars.singletab', ['subtitle'=>'Snacks','products'=>$products['Snacks'], 'latest'=>$latest]) --}}
      <!-- Categories Product Slider End-->
          
      <!-- Categories Product Slider Start -->
      <h3 class="subtitle">Beverages - <a class="viewall" href="category.html">view all</a></h3>
      @include('tabulars.singletab', ['subtitle'=>'Beverages','products'=>$products['Beverages']])
      <!-- Categories Product Slider End -->
          
          <!-- Brand Logo Carousel Start-->
          <div id="carousel" class="owl-carousel nxt">
            <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner11.jpg" alt="Coca-cola" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner1.jpg" alt="Nutri Snack" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner2.jpg" alt="Monde Nissin" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner3psd.jpg" alt="Columbia's" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner4.jpg" alt="Zesto" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner5.jpg" alt="URC" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner6.jpg" alt="ECCO" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner7.jpg" alt="Mondelez" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner8.jpg" alt="Del Monte" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner9.jpg" alt="Nutri Asia" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner10.jpg" alt="Pepsi" class="img-responsive" /></a> </div>
            
          <!-- Brand Logo Carousel End -->
        </div>
        <!--Middle Part End-->
      </div>
    </div>
@endsection
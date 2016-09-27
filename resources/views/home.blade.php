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
      @include('tabulars.simple', ['featured'=>$featured, 'latest'=>$latest])
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
      @include('tabulars.categorized', ['subtitle'=>'Fashion','featured'=>$featured, 'latest'=>$latest])
      <!-- Categories Product Slider End-->
          
      <!-- Categories Product Slider Start -->
      <h3 class="subtitle">Western Wear - <a class="viewall" href="category.html">view all</a></h3>
      <div class="owl-carousel latest_category_carousel">
        <div class="product-thumb">
          <div class="image"><a href="product.html"><img src="image/product/iphone_6-220x330.jpg" alt="Hair Care Cream for Men" title="Hair Care Cream for Men" class="img-responsive" /></a></div>
          <div class="caption">
            <h4><a href="product.html">Hair Care Cream for Men</a></h4>
            <p class="price"> $134.00 </p>
            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
          </div>
          <div class="button-group">
            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
            <div class="add-to-links">
              <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
              <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
        <div class="product-thumb">
          <div class="image"><a href="product.html"><img src="image/product/nikon_d300_5-220x330.jpg" alt="Hair Care Products" title="Hair Care Products" class="img-responsive" /></a></div>
          <div class="caption">
            <h4><a href="product.html">Hair Care Products</a></h4>
            <p class="price"> <span class="price-new">$66.80</span> <span class="price-old">$90.80</span> <span class="saving">-27%</span> </p>
            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
          </div>
          <div class="button-group">
            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
            <div class="add-to-links">
              <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
              <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
        <div class="product-thumb">
          <div class="image"><a href="product.html"><img src="image/product/nikon_d300_4-220x330.jpg" alt="Bed Head Foxy Curls Contour Cream" title="Bed Head Foxy Curls Contour Cream" class="img-responsive" /></a></div>
          <div class="caption">
            <h4><a href="product.html">Bed Head Foxy Curls Contour Cream</a></h4>
            <p class="price"> $88.00 </p>
          </div>
          <div class="button-group">
            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
            <div class="add-to-links">
              <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
              <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
        <div class="product-thumb">
          <div class="image"><a href=""><img src="image/product/macbook_5-220x330.jpg" alt="Shower Gel Perfume for Women" title="Shower Gel Perfume for Women" class="img-responsive" /></a></div>
          <div class="caption">
            <h4><a href="product.html">Shower Gel Perfume for Women</a></h4>
            <p class="price"> <span class="price-new">$95.00</span> <span class="price-old">$99.00</span> <span class="saving">-4%</span> </p>
          </div>
          <div class="button-group">
            <button class="btn-primary" type="button" onClick="cart.add('61');"><span>Add to Cart</span></button>
            <div class="add-to-links">
              <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick="wishlist.add('61');"><i class="fa fa-heart"></i></button>
              <button type="button" data-toggle="tooltip" title="Add to compare" onClick="compare.add('61');"><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
        <div class="product-thumb">
          <div class="image"><a href="product.html"><img src="image/product/macbook_4-220x330.jpg" alt="Perfumes for Women" title="Perfumes for Women" class="img-responsive" /></a></div>
          <div class="caption">
            <h4><a href="product.html">Perfumes for Women</a></h4>
            <p class="price"> $85.00 </p>
            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
          </div>
          <div class="button-group">
            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
            <div class="add-to-links">
              <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
              <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
        <div class="product-thumb">
          <div class="image"><a href="product.html"><img src="image/product/macbook_3-220x330.jpg" alt="Make Up for Naturally Beautiful Better" title="Make Up for Naturally Beautiful Better" class="img-responsive" /></a></div>
          <div class="caption">
            <h4><a href="product.html">Make Up for Naturally Beautiful Better</a></h4>
            <p class="price"> $123.00 </p>
          </div>
          <div class="button-group">
            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
            <div class="add-to-links">
              <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
              <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
        <div class="product-thumb">
          <div class="image"><a href="product.html"><img src="image/product/macbook_2-220x330.jpg" alt="Pnina Tornai Perfume" title="Pnina Tornai Perfume" class="img-responsive" /></a></div>
          <div class="caption">
            <h4><a href="product.html">Pnina Tornai Perfume</a></h4>
            <p class="price"> $110.00 </p>
          </div>
          <div class="button-group">
            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
            <div class="add-to-links">
              <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
              <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- Categories Product Slider End -->
          
          <!-- Brand Logo Carousel Start-->
          <div id="carousel" class="owl-carousel nxt">
            <div class="item text-center"> <a href="#"><img src="image/product/apple_logo-100x100.jpg" alt="Palm" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/product/canon_logo-100x100.jpg" alt="Sony" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/product/apple_logo-100x100.jpg" alt="Canon" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/product/canon_logo-100x100.jpg" alt="Apple" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/product/apple_logo-100x100.jpg" alt="HTC" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/product/canon_logo-100x100.jpg" alt="Hewlett-Packard" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/product/apple_logo-100x100.jpg" alt="brand" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="image/product/canon_logo-100x100.jpg" alt="brand1" class="img-responsive" /></a> </div>
          </div>
          <!-- Brand Logo Carousel End -->
        </div>
        <!--Middle Part End-->
      </div>
    </div>
@endsection
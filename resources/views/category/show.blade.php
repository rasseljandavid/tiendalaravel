@extends('layouts.app')

@section('metainfo')
	<title>Snacks Category : Tienda -Your First Online Grocery in the Philippines</title>
  <meta name="description" content="Snacks Category : Tienda - Your First Online Grocery in the Philippines">
@endsection

@section('content')
  <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="category.html">Electronics</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Left Part Start -->
        <aside id="column-left" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">Categories</h3>
          <div class="box-category">
            <ul id="cat_accordion">
              <li><a href="category.html">Fashion</a> <span class="down"></span>
                <ul>
                  <li><a href="category.html">Men</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">Sub Categories</a></li>
                      <li><a href="category.html">Sub Categories</a></li>
                      <li><a href="category.html">Sub Categories</a></li>
                      <li><a href="category.html">Sub Categories</a></li>
                      <li><a href="category.html">Sub Categories New</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">Women</a></li>
                  <li><a href="category.html">Girls</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">Sub Categories</a></li>
                      <li><a href="category.html">Sub Categories New</a></li>
                      <li><a href="category.html">Sub Categories New</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">Boys</a></li>
                  <li><a href="category.html">Baby</a></li>
                  <li><a href="category.html">Accessories</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">New Sub Categories</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a class="active" href="category.html">Electronics</a> <span class="down"></span>
                <ul style="display:block;">
                  <li><a href="category.html">Laptops</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">New Sub Categories</a></li>
                      <li><a href="category.html">New Sub Categories</a></li>
                      <li><a href="category.html">Sub Categories New</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">Desktops</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">New Sub Categories</a></li>
                      <li><a href="category.html">Sub Categories New</a></li>
                      <li><a href="category.html">Sub Categories New</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">Cameras</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">New Sub Categories</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">Mobile Phones</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">New Sub Categories</a></li>
                      <li><a href="category.html">New Sub Categories</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">TV &amp; Home Audio</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">New Sub Categories</a></li>
                      <li><a href="category.html">Sub Categories New</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">MP3 Players</a></li>
                </ul>
              </li>
              <li><a href="category.html">Shoes</a> <span class="down"></span>
                <ul>
                  <li><a href="category.html">Men</a></li>
                  <li><a href="category.html">Women</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">New Sub Categories</a></li>
                      <li><a href="category.html">Sub Categories</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">Girls</a></li>
                  <li><a href="category.html">Boys</a></li>
                  <li><a href="category.html">Baby</a></li>
                  <li><a href="category.html">Accessories</a><span class="down"></span>
                    <ul>
                      <li><a href="category.html">New Sub Categories</a></li>
                      <li><a href="category.html">New Sub Categories</a></li>
                      <li><a href="category.html">Sub Categories</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="category.html">Watches</a> <span class="down"></span>
                <ul>
                  <li><a href="category.html">Men's Watches</a></li>
                  <li><a href="category.html">Women's Watches</a></li>
                  <li><a href="category.html">Kids' Watches</a></li>
                  <li><a href="category.html">Accessories</a></li>
                </ul>
              </li>
              <li><a href="category.html">Health &amp; Beauty</a> <span class="down"></span>
                <ul>
                  <li><a href="category.html">Perfumes</a></li>
                  <li><a href="category.html">Makeup</a></li>
                  <li><a href="category.html">Sun Care</a></li>
                  <li><a href="category.html">Skin Care</a></li>
                  <li><a href="category.html">Eye Care</a></li>
                  <li><a href="category.html">Hair Care</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <h3 class="subtitle">Bestsellers</h3>
          <div class="side-item">
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/apple_cinema_30-50x75.jpg" alt="Brand Fashion Cotton T-Shirt" title="Brand Fashion Cotton T-Shirt" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Brand Fashion Cotton T-Shirt</a></h4>
                <p class="price"><span class="price-new">$110.00</span> <span class="price-old">$122.00</span> <span class="saving">-10%</span></p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/iphone_1-50x75.jpg" alt="iPhone5" title="iPhone5" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">iPhone5</a></h4>
                <p class="price"> $123.20 </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/macbook_1-50x75.jpg" alt="Ideapad Yoga 13-59341124 Laptop" title="Ideapad Yoga 13-59341124 Laptop" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Ideapad Yoga 13-59341124 Laptop</a></h4>
                <p class="price"> $2.00 </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/sony_vaio_1-50x75.jpg" alt="Xitefun Causal Wear Fancy Shoes" title="Xitefun Causal Wear Fancy Shoes" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Xitefun Causal Wear Fancy Shoes</a></h4>
                <p class="price"> <span class="price-new">$902.00</span> <span class="price-old">$1,202.00</span> <span class="saving">-25%</span> </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/FinePix-Long-Zoom-Camera-50x75.jpg" alt="FinePix S8400W Long Zoom Camera" title="FinePix S8400W Long Zoom Camera" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">FinePix S8400W Long Zoom Camera</a></h4>
                <p class="price">$122.00</p>
              </div>
            </div>
          </div>
          <h3 class="subtitle">Specials</h3>
          <div class="side-item">
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/macbook_pro_1-50x75.jpg" alt=" Strategies for Acquiring Your Own Laptop " title=" Strategies for Acquiring Your Own Laptop " class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Strategies for Acquiring Your Own Laptop</a></h4>
                <p class="price"> <span class="price-new">$1,400.00</span> <span class="price-old">$1,900.00</span> <span class="saving">-26%</span> </p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/samsung_tab_1-50x75.jpg" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Aspire Ultrabook Laptop</a></h4>
                <p class="price"> <span class="price-new">$230.00</span> <span class="price-old">$241.99</span> <span class="saving">-5%</span> </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/apple_cinema_30-50x75.jpg" alt="Brand Fashion Cotton T-Shirt" title="Brand Fashion Cotton T-Shirt" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="http://demo.harnishdesign.net/opencart/marketshop/v1/index.php?route=product/product&amp;product_id=42">Brand Fashion Cotton T-Shirt</a></h4>
                <p class="price"> <span class="price-new">$110.00</span> <span class="price-old">$122.00</span> <span class="saving">-10%</span> </p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/nikon_d300_1-50x75.jpg" alt="Digital Camera for Elderly" title="Digital Camera for Elderly" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Digital Camera for Elderly</a></h4>
                <p class="price"> <span class="price-new">$92.00</span> <span class="price-old">$98.00</span> <span class="saving">-6%</span> </p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/nikon_d300_5-50x75.jpg" alt="Hair Care Products" title="Hair Care Products" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Hair Care Products</a></h4>
                <p class="price"> <span class="price-new">$66.80</span> <span class="price-old">$90.80</span> <span class="saving">-27%</span> </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/image/product/macbook_air_1-50x75.jpg" alt="Laptop Silver black" title="Laptop Silver black" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">Laptop Silver black</a></h4>
                <p class="price"> <span class="price-new">$1,142.00</span> <span class="price-old">$1,202.00</span> <span class="saving">-5%</span> </p>
              </div>
            </div>
          </div>
          <div class="banner owl-carousel">
            <div class="item"> <a href="#"><img src="/image/banner/small-banner1-265x350.jpg" alt="small banner" class="img-responsive" /></a> </div>
            <div class="item"> <a href="#"><img src="/image/banner/small-banner-265x350.jpg" alt="small banner1" class="img-responsive" /></a> </div>
          </div>
        </aside>
        <!--Left Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <h1 class="title">Electronics</h1>
          
          <h3 class="subtitle">Refine Search</h3>
          <div class="category-list row">
                        <div class="col-sm-3">
          <ul class="list-item">
                        <li><a href="category.html">TV &amp; Home Audio (3)</a></li>
                        <li><a href="category.html">MP3 Players (2)</a></li>
                      </ul>
        </div>
                <div class="col-sm-3">
          <ul class="list-item">
                        <li><a href="category.html">Mobile Phones (2)</a></li>
                        <li><a href="category.html">Laptops (3)</a></li>
                      </ul>
        </div>
                <div class="col-sm-3">
          <ul class="list-item">
                        <li><a href="category.html">Desktops (0)</a></li>
                        <li><a href="category.html">Cameras (0)</a></li>
                      </ul>
        </div>
                      </div>
          
          <div class="product-filter">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                  <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                  <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
                <a href="/cart/compare" id="compare-total">Product Compare (0)</a> </div>
              <div class="col-sm-2 text-right">
                <label class="control-label" for="input-sort">Sort By:</label>
              </div>
              <div class="col-md-3 col-sm-2 text-right">
                <select id="input-sort" class="form-control col-sm-3">
                  <option value="" selected="selected">Default</option>
                  <option value="">Name (A - Z)</option>
                  <option value="">Name (Z - A)</option>
                  <option value="">Price (Low &gt; High)</option>
                  <option value="">Price (High &gt; Low)</option>
                  <option value="">Rating (Highest)</option>
                  <option value="">Rating (Lowest)</option>
                  <option value="">Model (A - Z)</option>
                  <option value="">Model (Z - A)</option>
                </select>
              </div>
              <div class="col-sm-1 text-right">
                <label class="control-label" for="input-limit">Show:</label>
              </div>
              <div class="col-sm-2 text-right">
                <select id="input-limit" class="form-control">
                  <option value="" selected="selected">20</option>
                  <option value="">25</option>
                  <option value="">50</option>
                  <option value="">75</option>
                  <option value="">100</option>
                </select>
              </div>
            </div>
          </div>
          <br />
          <div class="row products-category">
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="/image/product/macbook_pro_1-220x330.jpg" alt=" Strategies for Acquiring Your Own Laptop " title=" Strategies for Acquiring Your Own Laptop " class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.html"> Strategies for Acquiring Your Own Laptop </a></h4>
                    <p class="description"> Latest Intel mobile architecture
                      
                      Powered by the most advanced mobile processors from Intel, t..</p>
                    <p class="price"> <span class="price-new">$1,400.00</span> <span class="price-old">$1,900.00</span> <span class="saving">-26%</span> <span class="price-tax">Ex Tax: $1,400.00</span> </p>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                    <div class="add-to-links">
                      <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i> <span>Add to Wish List</span></button>
                      <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i> <span>Compare this Product</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="/image/product/nikon_d300_1-220x330.jpg" alt="Digital Camera for Elderly" title="Digital Camera for Elderly" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.html">Digital Camera for Elderly</a></h4>
                    <p class="description"> Engineered with pro-level features and performance, the 12.3-effective-megapixel D300 combines bra..</p>
                    <p class="price"> <span class="price-new">$92.00</span> <span class="price-old">$98.00</span> <span class="saving">-6%</span> <span class="price-tax">Ex Tax: $75.00</span> </p>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" type="button" onClick="cart.add('31');"><span>Add to Cart</span></button>
                    <div class="add-to-links">
                      <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i> <span>Add to Wish List</span></button>
                      <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i> <span>Compare this Product</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="/image/product/FinePix-Long-Zoom-Camera-220x330.jpg" alt="FinePix S8400W Long Zoom Camera" title="FinePix S8400W Long Zoom Camera" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.html">FinePix S8400W Long Zoom Camera</a></h4>
                    <p class="description">Product 8
                      ..</p>
                    <p class="price"> $122.00 <span class="price-tax">Ex Tax: $100.00</span> </p>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                    <div class="add-to-links">
                      <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i> <span>Add to Wish List</span></button>
                      <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i> <span>Compare this Product</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="/image/product/ipod_shuffle_1-220x330.jpg" alt="Hp Pavilion G6 2314ax Notebok Laptop" title="Hp Pavilion G6 2314ax Notebok Laptop" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.html">Hp Pavilion G6 2314ax Notebok Laptop</a></h4>
                    <p class="description">Born to be worn.
                      Clip on the worlds most wearable music player and take up to 240 songs with you an..</p>
                    <p class="price"> $122.00 <span class="price-tax">Ex Tax: $100.00</span> </p>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                    <div class="add-to-links">
                      <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i> <span>Add to Wish List</span></button>
                      <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i> <span>Compare this Product</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="/image/product/palm_treo_pro_1-220x330.jpg" alt="HTC M7 with Stunning Looks" title="HTC M7 with Stunning Looks" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.html">HTC M7 with Stunning Looks</a></h4>
                    <p class="description">Redefine your workday with the Palm Treo Pro smartphone. Perfectly balanced, you can respond to busi..</p>
                    <p class="price"> $337.99 <span class="price-tax">Ex Tax: $279.99</span> </p>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                    <div class="add-to-links">
                      <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i> <span>Add to Wish List</span></button>
                      <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i> <span>Compare this Product</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="/image/product/macbook_1-220x330.jpg" alt="Ideapad Yoga 13-59341124 Laptop" title="Ideapad Yoga 13-59341124 Laptop" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.html">Ideapad Yoga 13-59341124 Laptop</a></h4>
                    <p class="description"> Intel Core 2 Duo processor
                      
                      Powered by an Intel Core 2 Duo processor at speeds up to 2.16GHz, th..</p>
                    <p class="price"> $2.00 <span class="price-tax">Ex Tax: $0.00</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                    <div class="add-to-links">
                      <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i> <span>Add to Wish List</span></button>
                      <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i> <span>Compare this Product</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="/image/product/iphone_1-220x330.jpg" alt="iPhone5" title="iPhone5" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.html">iPhone5</a></h4>
                    <p class="description">iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a name o..</p>
                    <p class="price"> $123.20 <span class="price-tax">Ex Tax: $101.00</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                    <div class="add-to-links">
                      <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i> <span>Add to Wish List</span></button>
                      <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i> <span>Compare this Product</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="/image/product/macbook_air_1-220x330.jpg" alt="Laptop Silver black" title="Laptop Silver black" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.html">Laptop Silver black</a></h4>
                    <p class="description">MacBook Air is ultrathin, ultraportable, and ultra unlike anything else. But you don’t lose inches a..</p>
                    <p class="price"> <span class="price-new">$1,142.00</span> <span class="price-old">$1,202.00</span> <span class="saving">-5%</span> <span class="price-tax">Ex Tax: $950.00</span> </p>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                    <div class="add-to-links">
                      <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i> <span>Add to Wish List</span></button>
                      <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i> <span>Compare this Product</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="/image/product/ipod_nano_1-220x330.jpg" alt="Mp3 Player" title="Mp3 Player" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.html">Mp3 Player</a></h4>
                    <p class="description"> Video in your pocket.
                      
                      Its the small iPod with one very big idea: video. The worlds most popular..</p>
                    <p class="price"> $122.00 <span class="price-tax">Ex Tax: $100.00</span> </p>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                    <div class="add-to-links">
                      <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i> <span>Add to Wish List</span></button>
                      <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i> <span>Compare this Product</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="/image/product/ipod_classic_1-220x330.jpg" alt="Portable Mp3 Player" title="Portable Mp3 Player" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.html">Portable Mp3 Player</a></h4>
                    <p class="description"> More room to move.
                      
                      With 80GB or 160GB of storage and up to 40 hours of battery life, the new ..</p>
                    <p class="price"> $122.00 <span class="price-tax">Ex Tax: $100.00</span> </p>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                    <div class="add-to-links">
                      <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i> <span>Add to Wish List</span></button>
                      <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i> <span>Compare this Product</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="/image/product/ipod_touch_1-220x330.jpg" alt="Samsung Galaxy S4" title="Samsung Galaxy S4" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.html">Samsung Galaxy S4</a></h4>
                    <p class="description">Revolutionary multi-touch interface.
                      iPod touch features the same multi-touch screen technology as ..</p>
                    <p class="price"> <span class="price-new">$62.00</span> <span class="price-old">$122.00</span> <span class="saving">-50%</span> <span class="price-tax">Ex Tax: $50.00</span> </p>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                    <div class="add-to-links">
                      <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i> <span>Add to Wish List</span></button>
                      <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i> <span>Compare this Product</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="/image/product/samsung_tab_1-220x330.jpg" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.html">Aspire Ultrabook Laptop</a></h4>
                    <p class="description">Samsung Galaxy Tab 10.1, is the world’s thinnest tablet, measuring 8.6 mm thickness, running with An..</p>
                    <p class="price"> <span class="price-new">$230.00</span> <span class="price-old">$241.99</span> <span class="saving">-5%</span> <span class="price-tax">Ex Tax: $190.00</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                    <div class="add-to-links">
                      <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i> <span>Add to Wish List</span></button>
                      <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i> <span>Compare this Product</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 text-left">
              <ul class="pagination">
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">&gt;</a></li>
                <li><a href="#">&gt;|</a></li>
              </ul>
            </div>
            <div class="col-sm-6 text-right">Showing 1 to 12 of 15 (2 Pages)</div>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
@endsection
<div id="product-tab" class="product-tab">

    <ul id="tabs" class="tabs">
      <li><a href="#tab-featured">Featured</a></li>
      <li><a href="#tab-latest">Latest</a></li>
      <li><a href="#tab-bestseller">Bestseller</a></li>
      <li><a href="#tab-special">Special</a></li>
    </ul>

    <div id="tab-featured" class="tab_content">
      <div class="owl-carousel product_carousel_tab">
        @foreach( $featured as $product )
          @include('products.portrait', ['product'=>$product])
        @endforeach
      </div>
    </div>
    
    <div id="tab-latest" class="tab_content">
      <div class="owl-carousel product_carousel_tab">
        @foreach( $latest as $product )
          @include('products.portrait', ['product'=>$product])
        @endforeach
      </div>
    </div>

    <div id="tab-bestseller" class="tab_content">
      <div class="owl-carousel product_carousel_tab">
                    <div class="product-thumb">
                      <div class="image"><a href="product.html"><img src="image/product/FinePix-Long-Zoom-Camera-220x330.jpg" alt="FinePix S8400W Long Zoom Camera" title="FinePix S8400W Long Zoom Camera" class="img-responsive" /></a></div>
                      <div class="caption">
                        <h4><a href="product.html">FinePix S8400W Long Zoom Camera</a></h4>
                        <p class="price"> $122.00 </p>
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
                      <div class="image"><a href="product.html"><img src="image/product/nikon_d300_1-220x330.jpg" alt="Digital Camera for Elderly" title="Digital Camera for Elderly" class="img-responsive" /></a></div>
                      <div class="caption">
                        <h4><a href="product.html">Digital Camera for Elderly</a></h4>
                        <p class="price"> <span class="price-new">$92.00</span> <span class="price-old">$98.00</span> <span class="saving">-6%</span> </p>
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
    </div>

    <div id="tab-special" class="tab_content">
      <div class="owl-carousel product_carousel_tab">
                    <div class="product-thumb">
                      <div class="image"><a href="product.html"><img src="image/product/ipod_touch_1-220x330.jpg" alt="Samsung Galaxy S4" title="Samsung Galaxy S4" class="img-responsive" /></a></div>
                      <div class="caption">
                        <h4><a href="product.html">Samsung Galaxy S4</a></h4>
                        <p class="price"> <span class="price-new">$62.00</span> <span class="price-old">$122.00</span> <span class="saving">-50%</span> </p>
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
                      <div class="image"><a href="product.html"><img src="image/product/macbook_air_1-220x330.jpg" alt="Laptop Silver black" title="Laptop Silver black" class="img-responsive" /></a></div>
                      <div class="caption">
                        <h4><a href="product.html">Laptop Silver black</a></h4>
                        <p class="price"> <span class="price-new">$1,142.00</span> <span class="price-old">$1,202.00</span> <span class="saving">-5%</span> </p>
                      </div>
                      <div class="button-group">
                        <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                        <div class="add-to-links">
                          <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                          <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="product-thumb clearfix">
                <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-220x330.jpg" alt="Brand Fashion Cotton T-Shirt" title="Brand Fashion Cotton T-Shirt" class="img-responsive" /></a></div>
                <div class="caption">
                  <h4><a href="product.html">Brand Fashion Cotton T-Shirt</a></h4>
                  <p class="price"><span class="price-new">$110.00</span> <span class="price-old">$122.00</span><span class="saving">-10%</span></p>
                </div>
                <div class="button-group">
                  <button class="btn-primary" type="button" onClick="cart.add('42');"><span>Add to Cart</span></button>
                  <div class="add-to-links">
                    <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>
                    <div class="product-thumb">
                      <div class="image"><a href="product.html"><img src="image/product/macbook_pro_1-220x330.jpg" alt=" Strategies for Acquiring Your Own Laptop " title=" Strategies for Acquiring Your Own Laptop " class="img-responsive" /></a></div>
                      <div class="caption">
                        <h4><a href="product.html"> Strategies for Acquiring Your Own Laptop </a></h4>
                        <p class="price"> <span class="price-new">$1,400.00</span> <span class="price-old">$1,900.00</span> <span class="saving">-26%</span> </p>
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
                      <div class="image"><a href="product.html"><img src="image/product/samsung_tab_1-220x330.jpg" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-responsive" /></a></div>
                      <div class="caption">
                        <h4><a href="product.html">Aspire Ultrabook Laptop</a></h4>
                        <p class="price"> <span class="price-new">$230.00</span> <span class="price-old">$241.99</span> <span class="saving">-5%</span> </p>
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
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
    </div>

  </div> 
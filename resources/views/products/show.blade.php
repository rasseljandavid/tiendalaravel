@extends('layouts.app')

@section('content')
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a></li>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ url('/category/'.$product->categories[0]->slug) }}" itemprop="url"><span itemprop="title">{{$product->categories[0]->title}}</span></a></li>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="#" itemprop="url"><span itemprop="title">{{$product->title}}</span></a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <div itemscope itemtype="http://schema.org/Product">
            <h1 class="title" itemprop="name">{{ $product->title }}</h1>
            <div class="row product-info">
              <div class="col-sm-6">
                <div class="image"><img class="img-responsive" itemprop="image" id="zoom_01" src="/image/product/{{ $product->id .'.jpg' }}" title="{{ $product->title }}" alt="{{ $product->title }}" data-zoom-image="/image/product/{{ $product->id .'.jpg' }}"  onerror="this.src='/image/default.jpg'"/> </div>
                <!-- <div class="center-block text-center"><span class="zoom-gallery"><i class="fa fa-search"></i> Click image for Gallery</span></div> -->
                <!-- <div class="image-additional" id="gallery_01"> <a class="thumbnail" href="#" data-zoom-image="image/product/macbook_air_1-600x900.jpg" data-image="image/product/macbook_air_1-350x525.jpg" title="Laptop Silver black"> <img src="/image/product/macbook_air_1-66x99.jpg" title="Laptop Silver black" alt = "Laptop Silver black"/></a> <a class="thumbnail" href="#" data-zoom-image="image/product/macbook_air_4-600x900.jpg" data-image="image/product/macbook_air_4-350x525.jpg" title="Laptop Silver black"><img src="/image/product/macbook_air_4-66x99.jpg" title="Laptop Silver black" alt="Laptop Silver black" /></a> <a class="thumbnail" href="#" data-zoom-image="image/product/macbook_air_2-600x900.jpg" data-image="image/product/macbook_air_2-350x525.jpg" title="Laptop Silver black"><img src="/image/product/macbook_air_2-66x99.jpg" title="Laptop Silver black" alt="Laptop Silver black" /></a> <a class="thumbnail" href="#" data-zoom-image="image/product/macbook_air_3-600x900.jpg" data-image="image/product/macbook_air_3-350x525.jpg" title="Laptop Silver black"><img src="/image/product/macbook_air_3-66x99.jpg" title="Laptop Silver black" alt="Laptop Silver black" /></a> </div> -->
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled description">
                  <li><b>Supplier:</b> <a href="{{ $product->supplier->slugLink() }}"><span itemprop="brand">{{ $product->supplier->title }}</span></a></li>
                  <li><b>Product Code:</b> <span itemprop="mpn">{{ $product->sku }}</span></li>
                  <li><b>Reward Points:</b> {{ $product->rewardPoints }}</li>
                  <li><b>Available:</b> 
                    @if($product->quantity) {{ $product->quantity }}<!--  <span class="instock">In Stock </span> -->
                    @else <span class="nostock">Out of Stock </span>
                    @endif
                  </li>
                </ul>
                <ul class="price-box">
                  <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span class="price-old">{{ $product->price }}</span> <span itemprop="price">₱{{ $product->salePrice }}<span itemprop="availability" content="In Stock"></span></span></li>
                </ul>
                <div id="product">
                  <div class="cart">
                    <div>
                      @include('cart._addtocart', ['id'=>$product->id, 'btnclass'=>'btn btn-primary btn-lg'])
                    </div>
                    @include('products._options', ['type'=>'vertical'])
                  </div>
                </div>
                <div style="margin: 10px auto;">
                    {{$product->body}}
                </div>
                <div class="rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                  <meta itemprop="ratingValue" content="0" />
                  <p><b>Rating: </b>
                    <?php $rate = $product->rating ?>
                    @for( $i=1 ; $i <= 5; $i++)
                      <span class="fa fa-stack">
                        <i class="fa fa-star-o fa-stack-2x"></i>
                        @if($rate)
                          <i class="fa fa-star fa-stack-2x"></i>
                          <?php $rate-- ?>
                        @endif
                      </span> 
                    @endfor
              <!--       <span itemprop="reviewCount">1 reviews</span></a> / <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="">Write a review</a> -->
                  </p>
                </div>
                <hr>
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style"> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal" pi:pinit:url="http://www.addthis.com/features/pinterest" pi:pinit:media="http://www.addthis.com/cms-content/images/features/pinterest-lg.png"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514863386b357649"></script>
                <!-- AddThis Button END -->
              </div>
            </div>
            @if(!empty($product->body))
            <ul class="nav nav-tabs"> 
              <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
            <!--   <li><a href="#tab-specification" data-toggle="tab">Specification</a></li>
              <li><a href="#tab-review" data-toggle="tab">Reviews (2)</a></li> -->
            </ul>
        <!--     <div class="tab-content">
              <div itemprop="description" id="tab-description" class="tab-pane active">
                <div>
                  <p>
                  </p>
                </div>
              </div> -->
              <!-- <div id="tab-specification" class="tab-pane">
                <div id="tab-specification" class="tab-pane">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td colspan="2"><strong>Memory</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>test 1</td>
                      <td>8gb</td>
                    </tr>
                  </tbody>
                  </table>
                <table class="table table-bordered">
                <thead>
                    <tr>
                      <td colspan="2"><strong>Processor</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>No. of Cores</td>
                      <td>1</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </div>
              <div id="tab-review" class="tab-pane">
                <form class="form-horizontal">
                  <div id="review">
                    <div>
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr>
                            <td style="width: 50%;"><strong><span>harvey</span></strong></td>
                            <td class="text-right"><span>20/01/2016</span></td>
                          </tr>
                          <tr>
                            <td colspan="2"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                              <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div></td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr>
                            <td style="width: 50%;"><strong><span>Andrson</span></strong></td>
                            <td class="text-right"><span>20/01/2016</span></td>
                          </tr>
                          <tr>
                            <td colspan="2"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                              <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="text-right"></div>
                  </div>
                  <h2>Write a review</h2>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label for="input-name" class="control-label">Your Name</label>
                      <input type="text" class="form-control" id="input-name" value="" name="name">
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label for="input-review" class="control-label">Your Review</label>
                      <textarea class="form-control" id="input-review" rows="5" name="text"></textarea>
                      <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label class="control-label">Rating</label>
                      &nbsp;&nbsp;&nbsp; Bad&nbsp;
                      <input type="radio" value="1" name="rating">
                      &nbsp;
                      <input type="radio" value="2" name="rating">
                      &nbsp;
                      <input type="radio" value="3" name="rating">
                      &nbsp;
                      <input type="radio" value="4" name="rating">
                      &nbsp;
                      <input type="radio" value="5" name="rating">
                      &nbsp;Good</div>
                  </div>
                  <div class="buttons">
                    <div class="pull-right">
                      <button class="btn btn-primary" id="button-review" type="button">Continue</button>
                    </div>
                  </div>
                </form>
              </div> -->
            </div>
            @endif
            <h3 class="subtitle">Customers Who Bought This Item Also Bought</h3>
            <div class="owl-carousel related_pro">
              @foreach( $featured['relatedproducts'] as $product )
                @include('products.mini_portrait', ['product'=>$product])
              @endforeach
            </div>
          </div>

        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->
        <aside id="column-right" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">Bestsellers</h3>
          <div class="side-item">
            @foreach( $featured['bestseller'] as $product )
              @include('products.mini_portrait', ['product'=>$product])
            @endforeach
          </div>
          <!-- <div class="list-group">
            <h3 class="subtitle">Custom Content</h3>
            <p>This is a CMS block edited from admin. You can insert any content (HTML, Text, Images) Here. </p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
          </div> -->
          <h3 class="subtitle">Specials</h3>
          <div class="side-item">
            @foreach( $featured['special'] as $product )
              @include('products.mini_portrait', ['product'=>$product])
            @endforeach
          </div>
        </aside>
        <!--Right Part End -->
      </div>
    </div>

@endsection
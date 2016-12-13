<div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
  <div class="product-thumb">

    <div class="image">
      <a href="{{ $product->slugLink() }}">
        <img src="/image/product/{{ $product->id }}.jpg" alt="{{ $product->title }}" title="{{ $product->title }}" class="img-responsive" onerror="this.src='/image/default.jpg'" />
      </a>
    </div>

    <div>
      <div class="caption">
        <h4><a href="{{ $product->slugLink() }}">{{$product->title}}</a></h4>
        <p class="description"></p>
        <p class="price"><span style="font-size: 1.2em">₱</span>
          @if($product->salePrice)
            <span class="price-new">{{ $product->salePrice }}</span> 
            <span class="price-old">{{ $product->price }}</span>
            <span class="saving">{{ $product->getSavings() }}</span>
          @else
            {{ $product->price }}
          @endif
        </p>
        <!-- <p class="price"> $122.00 <span class="price-tax">Ex Tax: $100.00</span> </p> -->
      </div>
      <p>Available Stocks: {{$product->quantity}}</p>
    <div class="rating"> 
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
    </div>
      <div id="botton-group">
          <!-- @include('products._options', ['type'=>'btnonly'])<br/> -->
          <div class="cart">
            <div style="position:relative;">
              @include('cart._addtocart', ['id'=>$product->id, 'btnclass'=>'btn btn-primary btn-lg'])
            </div>
          </div>
        </div>
    </div>

  </div>
</div>
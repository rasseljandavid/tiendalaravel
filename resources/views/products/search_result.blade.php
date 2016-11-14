<div class="product-layout product-list col-xs-12">
  <div class="product-thumb">

    <div class="image">
      <a href="{{ $product->slugLink() }}">
        <img src="/image/product/{{ $product->id }}.jpg" alt="{{ $product->title }}" title="{{ $product->title }}" class="img-responsive" onerror="this.src='/image/default.jpg'" style="width: 220px !important; height: 330px !important;"/>
      </a>
    </div>

    <div>
      <div class="caption">
        <h4><a href="{{ $product->slugLink() }}">{{$product->title}}</a></h4>
        <p class="description"></p>
        <p class="price">₱
          @if($product->salePrice)
            <span class="price-new">{{ $product->salePrice }}</span> 
            <span class="price-old">{{ $product->price }}</span>
            <span class="saving">-{{ $product->getSavings() }}%</span>
          @else
            {{ $product->price }}
          @endif
        </p>
        <!-- <p class="price"> $122.00 <span class="price-tax">Ex Tax: $100.00</span> </p> -->
      </div>
      <div id="botton-group">
          @include('products._options', ['type'=>'btnonly'])<br/><br>
          <div class="cart">
            <div>
              @include('cart._addtocart', ['id'=>$product->id, 'btnclass'=>'btn btn-primary btn-lg'])
            </div>
          </div>
        </div>
    </div>

  </div>
</div>
<div class="product-thumb clearfix">
  <div class="image">
    <a href="{{ $product->slugLink() }}">
      <img src="/image/product/{{ $product->id }}.jpg" alt="{{ $product->title }}" title="{{ $product->title }}" class="img-responsive" onerror="this.src='/image/default.jpg'"/>
    </a>
  </div>
  <div class="caption">
    <h4><a href="{{ $product->slugLink() }}">{{ $product->title }}</a></h4>
    <p class="price">
      @if($product->salePrice)
        <span class="price-new">{{ $product->salePrice }}</span> 
        <span class="price-old">{{ $product->price }}</span>
        <span class="saving">{{ $product->getSavings() }}</span>
      @else
        {{ $product->price }}
      @endif
    </p>
    <p>Qty: {{$product->quantity}}</p>
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
    <div class="add-to-links">
    
      <!-- @include('products._options', ['type'=>'btnonly']) -->
    </div><br>
    <div class="clearer"></div>
  </div>
  <div class="product">
    <div class="cart">
      @include('cart._addtocart', ['id'=>$product->id, 'btnclass'=>'btn btn-primary btn-lg'])
    </div>
  </div>
</div>
<div class="product-thumb clearfix">
  <div class="image"><a href="{{ $product->slugLink() }}"><img src="/image/product/{{ $product->id }}.jpg" alt="{{ $product->title }}" title="{{ $product->title }}" class="img-responsive" /></a></div>
  <div class="caption">
    <h4><a href="{{ $product->slugLink() }}">{{ $product->title }}</a></h4>
    <p class="price">
      @if($product->salePrice)
        <span class="price-new">{{ $product->salePrice }}</span> 
        <span class="price-old">{{ $product->price }}</span>
        <span class="saving">-{{ $product->getSavings() }}%</span>
      @else
        {{ $product->price }}
      @endif
     </p>
  </div>
</div>
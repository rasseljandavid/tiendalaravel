<div class="product-thumb clearfix">
  <div class="image"><a href="{{ $product->slugLink() }}"><img src="/image/product/{{ $product->id }}.jpg" alt="{{ $product->title }}" title="{{ $product->title }}" class="img-responsive" onerror="this.src='/image/default.jpg'" /></a></div>
  <div class="caption">
    <h4 style="margin-top: 20px; height: auto;"><a href="{{ $product->slugLink() }}">{{ $product->title }}</a></h4>
    <p class="price">
      @if($product->salePrice)
        <span style="font-size: 1.2em">₱</span><span class="price-new">{{ $product->salePrice }}</span> 
        <span class="price-old">{{ $product->price }}</span>
        <span class="saving">-{{ $product->getSavings() }}</span>
      @else
        {{ $product->price }}
      @endif
     </p>
  </div>
</div>
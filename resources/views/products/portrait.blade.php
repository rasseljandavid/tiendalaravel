<div class="product-thumb clearfix">
  <div class="image">
    <a href="product.html">
      <img src="image/product/{{ $product->image }}" alt="{{ $product->title }}" title="{{ $product->title }}" class="img-responsive" />
    </a>
  </div>
  <div class="caption">
    <h4><a href="product.html">{{ $product->title }}</a></h4>
    <p class="price">
      @if($product->savings)
        <span class="price-new">${{ $product->new_price }}</span> 
        <span class="price-old">${{ $product->base_price }}</span>
        <span class="saving">-{{ $product->savings }}</span>
      @else
        {{ $product->base_price }}
      @endif
    </p>
    <div class="rating"> 
      @for( $i=1 ; $i <= 5; $i++)
        <span class="fa fa-stack">
          <i class="fa fa-star-o fa-stack-2x"></i>
          @if($product->rating)
            <i class="fa fa-star fa-stack-2x"></i>
            {{ $product->rating-- }}
          @endif
        </span> 
      @endfor
    </div>
  </div>
  <div class="button-group">
    <button class="btn-primary" type="button" onClick="cart.add({{ $product->id }});"><span>Add to Cart</span></button>
    <div class="add-to-links">
      <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i></button>
      <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i></button>
    </div>
  </div>
</div>
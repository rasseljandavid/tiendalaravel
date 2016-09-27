
<div class="owl-carousel latest_category_carousel">
  @foreach( $featured as $product )
    @include('products.portrait', ['product'=>$product])
  @endforeach
</div>
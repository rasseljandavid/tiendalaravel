<div class="col-md-12">
  <div class="row">
    @foreach( $products as $product )
      <div class="product-layout product-list col-xs-12">
        @include('products.portrait', ['product'=>$product])
      </div>
    @endforeach
  </div>
</div>

<div class="col-md-12">
  <div class="row">
    <div class="col-sm-6 text-left">
      {{$products->appends(Request::except('page'))->links()}}
    </div>
    <div class="col-sm-6 text-right">Showing {{ $products->toArray()['from'] }} to {{ $products->toArray()['to'] }} of {{ $products->total() }} ({{ $products->currentPage() }} Pages)
    </div>
  </div>
</div>
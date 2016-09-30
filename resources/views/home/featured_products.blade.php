<div id="product-tab" class="product-tab">

    <ul id="tabs" class="tabs">
        @foreach($featured as $key => $products)
            <li><a href="#tab-{{ $key }}">{{ $key }}</a></li>
        @endforeach
    </ul>

    @foreach($featured as $key => $products)
    <div id="tab-{{$key}}" class="tab_content">
        <div class="owl-carousel product_carousel_tab">
            @foreach($products as $product)
              @include('products.portrait')
            @endforeach
        </div>
    </div>
    @endforeach
    
</div> 
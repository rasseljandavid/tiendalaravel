<div class="category-module" id="latest_category">
  <h3 class="subtitle">{{ $subtitle }} - <a class="viewall" href="category.tpl">view all</a></h3>
  <div class="category-module-content">
    <ul id="sub-cat" class="tabs">
      <li><a href="#tab-cat1">Men</a></li>
      <li><a href="#tab-cat2">Women</a></li>
      <li><a href="#tab-cat3">Girls</a></li>
      <li><a href="#tab-cat4">Boys</a></li>
      <li><a href="#tab-cat5">Baby</a></li>
      <li><a href="#tab-cat6">Accessories</a></li>
    </ul>

    <div id="tab-cat1" class="tab_content">
      <div class="owl-carousel latest_category_tabs">
        @foreach( $featured as $product )
          @include('products.portrait', ['product'=>$product])
        @endforeach
      </div>
    </div>


    <div id="tab-cat2" class="tab_content">
      <div class="owl-carousel latest_category_tabs">
        @foreach( $latest as $product )
          @include('products.portrait', ['product'=>$product])
        @endforeach
      </div>
    </div>



    <div id="tab-cat3" class="tab_content">
      <div class="owl-carousel latest_category_tabs">
        @foreach( $featured as $product )
          @include('products.portrait', ['product'=>$product])
        @endforeach
      </div>
    </div>


    <div id="tab-cat4" class="tab_content">
      <div class="owl-carousel latest_category_tabs">
        @foreach( $latest as $product )
          @include('products.portrait', ['product'=>$product])
        @endforeach
      </div>
    </div>


    <div id="tab-cat5" class="tab_content">
      <div class="owl-carousel latest_category_tabs">
        @foreach( $featured as $product )
          @include('products.portrait', ['product'=>$product])
        @endforeach
      </div>
    </div>


    <div id="tab-cat6" class="tab_content">
      <div class="owl-carousel latest_category_tabs">
        @foreach( $latest as $product )
          @include('products.portrait', ['product'=>$product])
        @endforeach
      </div>
    </div>


  </div>
</div>
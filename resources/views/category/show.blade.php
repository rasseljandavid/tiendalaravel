@extends('layouts.app')

@section('content')
  <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="{{ $category->slugLink() }}">{{ $category->title }}</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Left Part Start -->
        <aside id="column-left" class="col-sm-3 hidden-xs">
        <h3 class="subtitle">Categories</h3>
          <div class="box-category">
            <ul id="cat_accordion">

              @foreach($categories as $cat)
                @if($cat->title == $category->title)
                  <li><a class="active" href="{{$cat->slugLink()}}" style="margin-bottom: 0px;">{{ $cat->title }}</a></li>
                @else 
                  <li><a href="{{$cat->slugLink()}}">{{ $cat->title }}</a></li>
                @endif
             @endforeach
            </ul>
          </div>
          <h3 class="subtitle">Bestsellers</h3>
          <div class="side-item">
            @foreach( $featured['bestseller'] as $product )
              @include('products.mini_portrait', ['product'=>$product])
            @endforeach
          </div>
          <h3 class="subtitle">Specials</h3>
          <div class="side-item">
            @foreach( $featured['special'] as $product )
              @include('products.mini_portrait', ['product'=>$product])
            @endforeach
          </div>
        </aside>
        <!--Left Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
           <div class="row">
               <img style="margin: auto" class="img-responsive" src="/image/category/header-{{ $category->title }}.jpg" alt="{{$category->title}}"/>
           </div>
          
          <!-- <h3 class="subtitle">Refine Search</h3>
          <div class="category-list row">
            <div class="col-sm-3">
              <ul class="list-item">
                <li><a href="category.html">TV &amp; Home Audio (3)</a></li>
                <li><a href="category.html">MP3 Players (2)</a></li>
              </ul>
            </div>
            <div class="col-sm-3">
              <ul class="list-item">
                <li><a href="category.html">Mobile Phones (2)</a></li>
                <li><a href="category.html">Laptops (3)</a></li>
              </ul>
            </div>
            <div class="col-sm-3">
              <ul class="list-item">
                <li><a href="category.html">Desktops (0)</a></li>
                <li><a href="category.html">Cameras (0)</a></li>
              </ul>
            </div>
          </div> -->
          
          <div class="product-filter" style="border: 0px; border-bottom: 5px solid #ffec6d; background: #ffffff; padding: 6px 5px; line-height: 25px; padding-top: 20px;">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                  <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                  <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
                <a href="/cart/compare" id="compare-total"><!-- Product Compare (0) --></a> </div>
              <div class="col-sm-4 text-right">
                <label class="control-label" for="input-sort">Sort By:</label>
              </div>
              <div class="col-md-4 col-sm-3 text-right">
                <select id="input-sort" class="form-control col-sm-3"">
                  <option value="rank_asc" selected="selected">Default</option>
                  <option value="title_asc">Name (A - Z)</option>
                  <option value="title_desc">Name (Z - A)</option>
                  <option value="salePrice_asc">Price (Low &gt; High)</option>
                  <option value="salePrice_desc">Price (High &gt; Low)</option>
                  <option value="rating_asc">Rating (Highest)</option>
                  <option value="rating_desc">Rating (Lowest)</option>
                  <option value="sku_asc">Model (A - Z)</option>
                  <option value="sku_desc">Model (Z - A)</option>
                </select>
              </div>
              <!-- <div class="col-sm-1 text-right">
                <label class="control-label" for="input-limit">Show:</label>
              </div>
              <div class="col-sm-2 text-right">
                <select id="input-limit" class="form-control">
                  <option value="20" selected="selected">20</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="75">75</option>
                  <option value="100">100</option>
                </select>
              </div> -->
            </div>
          </div>
          <br />

          <!-- Showing of Products per Category -->
          <div class="row products-category scroll">
            <div class="col-md-12">
              <div class="row">
                @foreach( $products as $product )
                  <div class="product-layout product-list col-xs-12">
                    @include('products.portrait', ['product'=>$product])
                  </div>
                @endforeach
              </div>
            </div>
            @if (!empty($products->toArray()['next_page_url']))
            <a id="jscroll-next" href="/ajax/category?page={{$nextpage}}&category={{$slug}}" style="display: none;">Next page</a>
            @endif
            <!-- <div class="col-md-12">
              <div class="row">
                <div class="col-sm-6 text-left">
                  {{$products->appends(Request::except('page'))->links()}}
                </div>
                <div class="col-sm-6 text-right">Showing {{ $products->toArray()['from'] }} to {{ $products->toArray()['to'] }} of {{ $products->total() }} ({{ $products->currentPage() }} Pages)
                </div>
              </div>
            </div>   -->        
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
@endsection


@section('script')

  <script type="text/javascript">
    $(document).ready(function() {
        var category = '{{ $slug }}';
        // var perPage = $('#input-limit').val();
        // var sort = $('#input-sort').val();

        // getProducts();

        // $(document).on('click', '.pagination a', function (e) {
        //     page = $(this).attr('href').split('&')[3];
        //     getProducts();
        //     e.preventDefault();
        // });

        // $(document).on('change', '#input-limit', function(e) {
        //     perPage = $(this).val();
        //     getProducts();
        // });

        $(document).on('change', '#input-sort', function(e) {
            sort = $(this).val();
            getProducts();
        });

        function getProducts() {
          $.ajax({
              url : '/ajax/category?page=1&category='+ category +'&sort=' + sort +'&ajax_action=1',
              dataType: 'json',
          }).done(function (data) {
              $('.row.products-category').html(data);
              trigger();
              $(window).bind('scroll');
          }).fail(function () {
              alert('Products could not be loaded.');
          });
        }

        trigger();

        function trigger() {
          if(!$('#list-view').hasClass('selected')) {
            $('#grid-view').trigger('click'); 
          } 
        }

        $('.scroll').jscroll({
          loadingHtml: '<div class="col-md-12 text-center""> <img  src="/image/progress.gif" alt="Loading" /></div>',
          padding: 20,
          refresh: true,
          nextSelector: 'a#jscroll-next:last',
          callback: trigger,
        });
    });

  </script>


@endsection
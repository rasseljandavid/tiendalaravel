@extends('layouts.app')

@section('metainfo')
	<title>Search : Tienda -Your First Online Grocery in the Philippines</title>
  <meta name="description" content="Search : Tienda -Your First Online Grocery in the Philippines">
@endsection

@section('content')
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Search</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">Search - {{ $term }}</h1>
          <label>Search Criteria</label>
          <div class="row">
            <form method="GET" action="/search/" id="search-form">
              {{ csrf_field() }}
            <div class="col-sm-4">
              <input type="text" class="form-control" placeholder="Keywords" value="{{ $term }}" name="term">
            </div>
            <div class="col-sm-3">
              <select class="form-control" name="category_id">
                <option value="0">All Categories</option> 
                @foreach( $categories as $cat )
                  <option value="{{ $cat->id }}" @if($category_id==$cat->id) selected @endif>{{ $cat->title}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-3">
              <input type="submit" class="btn btn-primary" id="button-search" value="Search">
            </div>
            </form>
          </div>
          <br>
          <div class="product-filter">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                  <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                  <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
                <a href="compare.html" id="compare-total">Product Compare (0)</a> </div>
              <div class="col-sm-2 text-right">
                <label class="control-label" for="input-sort">Sort By:</label>
              </div>
              <div class="col-md-3 col-sm-2 text-right">
                <select id="input-sort" class="form-control col-sm-3">
                  <option value="" selected="selected">Default</option>
                  <option value="">Name (A - Z)</option>
                  <option value="">Name (Z - A)</option>
                  <option value="">Price (Low &gt; High)</option>
                  <option value="">Price (High &gt; Low)</option>
                  <option value="">Rating (Highest)</option>
                  <option value="">Rating (Lowest)</option>
                  <option value="">Model (A - Z)</option>
                  <option value="">Model (Z - A)</option>
                </select>
              </div>
              <div class="col-sm-1 text-right">
                <label class="control-label" for="input-limit">Show:</label>
              </div>
              <div class="col-sm-2 text-right">
                <select id="input-limit" class="form-control">
                  <option value="" selected="selected">20</option>
                  <option value="">25</option>
                  <option value="">50</option>
                  <option value="">75</option>
                  <option value="">100</option>
                </select>
              </div>
            </div>
          </div>
          <br />
            @foreach( $products as $product )
              @include('products.search_result', ['product'=>$product])
            @endforeach
          </div>
          <div class="row">
            <div class="col-sm-6 text-left">
              <ul class="pagination">
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">&gt;</a></li>
                <li><a href="#">&gt;|</a></li>
              </ul>
            </div>
            <div class="col-sm-6 text-right">Showing 1 to 12 of 15 (2 Pages)</div>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
@endsection
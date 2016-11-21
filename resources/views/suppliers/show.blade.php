@extends('layouts.app')

@section('content')
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="/suppliers">Suppliers</a></li>
        <li><a href="#!">{{ $supplier->title }}</a></li>
      </ul>
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-xs-12">
            <h1 class="title">{{ $supplier->title }}</h1>
            <div class="row supplier-products">
                  @foreach ($supplier->products->chunk(4) as $chunk)
                      <div class="row">
                          @foreach ($chunk as $product)
                              <div class="col-xs-3">
                                @include('products.portrait')
                              </div>
                          @endforeach
                      </div>
                  @endforeach
            </div>
        </div>
      </div>
    </div>
@endsection
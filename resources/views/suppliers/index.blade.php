@extends('layouts.app')

@section('metainfo')
	<title>Suppliers : Tienda -Your First Online Grocery in the Philippines</title>
  <meta name="description" content="About Us : Tienda -Your First Online Grocery in the Philippines">
@endsection

@section('content')
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="/suppliers">Suppliers</a></li>
      </ul>
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-xs-12">
            <h1 class="title">Suppliers</h1>
            <div class="row">
                  @foreach($suppliers as $supplier)
                      <div class="col-md-3">
                          <a href="{{ $supplier->slugLink() }}">
                            <img style="margin: 20px auto;" src="image/suppliers/tienda-supplier-{{$supplier->id.'.jpg'}}" alt="{{$supplier->title}}" class="img-responsive" />
                          </a>
                      </div>
                  @endforeach


            </div>
        </div>
      </div>
    </div>
@endsection
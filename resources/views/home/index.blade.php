@extends('layouts.app')

@section('metainfo')
	<title>Tienda - Your First Online Grocery in the Philippines</title>
	<meta name="description" content="Tienda - Your First Online Grocery in the Philippines">
@endsection

@section('content')
    
<div class="container">
    <div class="row">
        <div id="content" class="col-xs-12">

            @include('home.slideshow')

            @include('home.banner', ['size'=>'small'])

            @include('home.featured_products')

            @include('home.banner', ['size'=>'big']);
          
            <!--   nclude('tabulars.singleta -->
            @include('home.suppliers');
        </div>
    </div>
</div>
@endsection
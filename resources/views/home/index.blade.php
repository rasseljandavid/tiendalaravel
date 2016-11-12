@extends('layouts.app')

@section('metainfo')
	<title>Tienda - Your First Online Grocery in the Philippines</title>
	<meta name="description" content="Tienda - Your First Online Grocery in the Philippines">
        <meta property="og:image" content="image/slider/slide1.jpg" />
        <meta property="og:image" content="image/slider/slide2.jpg" />
        <meta property="og:image" content="image/slider/slide3.jpg" />
        <meta property="og:image" content="image/slider/slide4.jpg" />
        <meta property="og:image" content="image/slider/slide5.jpg" />

@endsection

@section('content')
    
<div class="container">
    <div class="row">
        <div id="content" class="col-xs-12">

            @include('home.slideshow')

            @include('home.banner', ['size'=>'small'])

            @include('home.featured_products')

            @include('home.banner', ['size'=>'big'])
          
            @include('home.featured_categories')

            @include('home.suppliers')

        </div>
    </div>
</div>
@endsection

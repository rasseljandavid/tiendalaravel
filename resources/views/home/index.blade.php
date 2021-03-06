@extends('layouts.app')

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

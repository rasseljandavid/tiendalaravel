@extends('layouts.app')

@section('metainfo')
	<title>Shopping Cart : Tienda -Your First Online Grocery in the Philippines</title>
  <meta name="description" content="Shopping Cart : Tienda - Your First Online Grocery in the Philippines">
@endsection

@section('content')
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="/cart/show">Shopping Cart</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">Shopping Cart</h1>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">Image</td>
                    <td class="text-left">Product Name</td>
                    <td class="text-left">Model</td>
                    <td class="text-left">Quantity</td>
                    <td class="text-right">Unit Price</td>
                    <td class="text-right">Total</td>
                  </tr>
                </thead>
                <tbody>
                  @if($cart && count($cart->orderitems))
                    @foreach($cart->orderitems as $oi)
                        <?php $oiProd =  $oi->getProduct(); ?>
                        <tr>
                            <td class="text-center"><a href="{{$oiProd->slugLink()}}"><img style="max-width:50px;max-height:75px;width:100%;height:auto;" src="/image/product/{{ $oiProd->id.'.jpg' }}" alt="{{ $oiProd->title }}" title="{{ $oiProd->title }}" class="img-thumbnail" /></a></td>
                            <td class="text-left"><a href="{{$oiProd->slugLink()}}">{{$oiProd->title}}</a><br />
                              <small>{{$oiProd->reward}}</small></td>
                            <td class="text-left">{{$oiProd->sku}}</td>
                            <td class="text-left">
                                <div class="input-group btn-block quantity">
                                @include('cart._itemaction')
                                </div>
                            </td>
                            <td class="text-right">₱{{$oi->price}}</td>
                            <td class="text-right">₱{{ number_format(($oi->quantity * $oi->price), 2) }}</td>
                          </tr>
                    @endforeach
                  @else
                    Your Cart is empty
                  @endif
                </tbody>
              </table>
            </div>
          <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
                @include('cart._total')
            </div>
          </div>
          <div class="buttons">
            <div class="pull-left"><a href="{{url('/')}}" class="btn btn-default">Continue Shopping</a></div>
            <div class="pull-right"><a href="{{url('/cart/checkout')}}" class="btn btn-primary">Checkout</a></div>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
@endsection







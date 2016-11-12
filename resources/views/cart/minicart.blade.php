<div id="cart">
<div id="loading-btn" style="right:0;height:100%;" class=""></div>
  <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle">  
  <span id="cart-total">
  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
  @if($cart){{count($cart->orderitems)}} item(s) - {{$cart->total}}
  @else 0 item(s) - ₱0.00
  @endif
  </span></button>
  <ul class="dropdown-menu">
    <li>
      <table class="table">
        <tbody>
          @if($cart && count($cart->orderitems))
            @foreach($cart->orderitems as $oi)
              @if($loop->index == 2) @break @endif
              <?php $oiProd =  $oi->getProduct(); ?>
              <tr>
                  <td class="text-center"><a href="{{$oiProd->slugLink()}}"><img style="max-width:50px;max-height:75px;width:100%;height:auto;" class="img-thumbnail" title="{{ $oiProd->title }}" alt="{{ $oiProd->title }}" src="/image/product/{{ $oiProd->id.'.jpg' }}" onerror="this.src='/image/default.jpg'"></a></td>
                  <td class="text-left"><a href="{{$oiProd->slugLink()}}">{{ $oiProd->title }}</a></td>
                  <td class="text-right">x{{ $oi->quantity }}</td>
                  <td class="text-right">₱{{ ($oi->quantity * $oi->price) }}</td>
                  <td class="text-center">
                  @include('cart._deleteitem', ['btnclass'=>'btn-xs remove','iclass'=>'fa-times'])
              </tr>
            @endforeach
          @else
            <tr>
              <td>
                Your cart is empty
              </td>
            </tr>
          @endif
        </tbody>
      </table>
    </li>
    <li>
      <div>
        @include('cart._total')
        <p class="checkout"><a href="/cart/show" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> View Cart</a>&nbsp;&nbsp;&nbsp;<a href="/cart/checkout" class="btn btn-primary"><i class="fa fa-share"></i> Checkout</a></p>
      </div>
    </li>
  </ul>
</div>
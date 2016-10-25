@php $item=($cart ? $cart->getItemFromProduct($id) : 0) @endphp
<div class="qty add-to-cart">
	<div id="loading-btn" class="bar"></div>
	<form method="POST" action="{{ url('/cart/addItem') }}" class="form form-addtocart">
		<input type="text" name="cart_item_quantity" value="{{ $item->quantity or 0 }}" size="2" id="input-quantity" class="form-control btn-addtocart" readonly />
    <input type="hidden" id="quantity-holder" value="{{ $item->quantity or 0 }}">
    <div class="clear"></div>
    <input type="hidden" name="product_id" value="{{ $id }}">
    <input type="hidden" name="update" value="update">
    <button type="button" id="submit" class="{{ $btnclass }} btn-addtocart"><span>Add to cart</span></button>
		<!-- <input type="submit" name="submit" value="Submit" class="hidden"> -->
	</form>
</div>

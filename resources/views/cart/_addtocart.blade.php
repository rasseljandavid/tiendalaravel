<form method="POST" action="{{ url('/cart/addItem') }}" class="form form-addtocart">
	{{ csrf_field() }}
	<input type="hidden" id="cart-item-quantity" name="cart_item_quantity" value>
	<input type="hidden" name="product_id" value="{{ $id }}">
	<button type="submit" class="{{ $class }}" ><span>Add to Cart</span></button>
</form>
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$(".form-addtocart").each(function(){
			var form = $(this);
			form.submit(function(e){
				@if( is_numeric($input) )
					form.children("#cart-item-quantity").val({{ $input }});
				@else
					form.children("#cart-item-quantity").val($("#{{ $input }}").val());
				@endif
			});
		});
	});
</script>
@endsection